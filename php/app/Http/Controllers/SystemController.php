<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Notification;
use App\Models\SavingsAccount;
use App\Models\Goal;
use App\Models\SavingsCalculator;
use App\Models\Achievement;
use App\Models\UserReward;
use App\Models\Reward;
use App\Models\Transaction;
use App\Models\FinancialTip;
use App\Models\Article;
use Auth;

class SystemController extends Controller
{
    public function mark_notification_as_read($id)
    {
        $notification = Notification::find($id);

        $notification->status_flag = true;
        $notification->save();

        return back();
    }

    public function show_my_savings_account()
    {
         $my_savings = \DB::table('savings_accounts')
            ->where('user_id', Auth::user()->id)
            ->first();

        if (is_null($my_savings)) {
            $my_savings = new SavingsAccount();
            $my_savings->user_id = Auth::user()->id;
            $my_savings->account_balance = 0;
            $my_savings->account_type = 'SAVINGS';
            $my_savings->save();
        }

        return view('dashboard.pages.savings.my_savings', ['my_savings' => $my_savings]);
    }

    public function show_financial_tips()
    {
        return view('dashboard.pages.tips.financial_tips');
    }

     public function show_articles()
    {
        return view('dashboard.pages.articles.articles');
    }

    public function show_transactions(){
        return view('dashboard.pages.transactions.my_transactions');
    }

     public function show_goals(){
        return view('dashboard.pages.goals.my_goals');
    }

    public function show_archievements()
    {
        return view('dashboard.pages.achievements.my_achievements');
    }

    public function show_rewards()
    {
        return view('dashboard.pages.rewards.my_rewards');
    }

    public function show_savings_calculators()
    {
        return view('dashboard.pages.goals.my_savings_calculator');
    }

    public function show_add_goal()
    {
        return view('dashboard.pages.goals.add_goal');
    }

    public function add_goal(Request $request){
        $request->validate([
            'target_amount' => 'required'
        ]);

        $goal = new Goal();
        $goal->user_id = Auth::user()->id;
        $goal->target_amount = $request['target_amount'];
        $goal->current_progress = 0;
        $goal->save();

        $calc = new SavingsCalculator();
        $calc->goal_id = $goal->id;
        $calc->user_id = $calc->user_id;
        $calc->principal_amount = $goal->target_amount;
        $calc->save();

        return redirect('/account-goals')->with(['message' => 'Goal created successfully!']);
    }

    public function show_add_transaction($id)
    {
        $calc = SavingsCalculator::where('goal_id', $id)->first();

        return view('dashboard.pages.goals.add_transaction', ['calc' => $calc]);
    }

    public function add_transaction(Request $request)
    {
        $request->validate([
            'goal_id' => 'required',
            'calc_id' => 'required',
            'transaction_amount' => 'required',
            'transaction_type' => 'required'
        ]);


        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_type = $request['transaction_type'];
        $transaction->amount = $request['transaction_amount'];
        $transaction->has_succeeded = false;
        $transaction->save();

        $goal = Goal::find($request['goal_id']);
        $calc =  SavingsCalculator::find($request['calc_id']);

        $savings_account = SavingsAccount::where('user_id', $goal->user_id)->first();

        if(is_null($savings_account))
        {
            $savings_account = new SavingsAccount();
            $savings_account->user_id = Auth::user()->id;
            $savings_account->save();
        }



        if($request['transaction_type'] == "DEPOSIT")
        {
            if($goal->current_progress < 1 && $transaction->amount >= 20000)
            {
                $user_reward = new UserReward();
                $user_reward->user_id = Auth::user()->id;
                $user_reward->reward_id = 3;
                $user_reward->save();

                $reward = Reward::find($user_reward->reward_id);

                $notification = new Notification();
                $notification->user_id = Auth::user()->id;
                $notification->title = "REWARD EARNED";
                $notification->content = "A reward of UGX $reward->point_cost has been given to you!";
                $notification->save();
            }

            $goal->current_progress += (int)$transaction->amount;
            $calc->principal_amount -= (int)$transaction->amount;
            $savings_account->account_balance += (int)$transaction->amount;

            $goal->save();
            $calc->save();
            $savings_account->save();

             $notification = new Notification();
             $notification->user_id = Auth::user()->id;
             $notification->title = "DEPOSIT SUCCESS";
             $notification->content = "A deposit of UGX $transaction->amount was made to your savings account! Trans ID: $transaction->id";
             $notification->save();

           



            //  if($transaction->amount > 50000)
            //  {
            //     $user_reward->reward_id = 3;
            //  }

            //  if($transaction->amount > 20000 && $transaction->amount < 50000)
            //  {
            //     $user_reward->reward_id = 2;
            //  }

            //   if($transaction->amount <= 20000 && $transaction->amount > 0)
            //  {
            //     $user_reward->reward_id = 1;
            //  }

            // $user_reward->save();

            

            if($goal->current_progress  >= $goal->target_amount )
            {
                $goal->completion_status = "COMPLETE";
                $goal->save();

                $achievement = new Achievement();
                $achievement->user_id = Auth::user()->id;
                $achievement->name = "SAVINGS GOAL ACHIEVED OF UGX $goal->target_amount REACHED";
                $achievement->description = "You have managed to save the full amount Ugx $goal->target_amount described in your goal! Trans ID: $transaction->id";
                $achievement->date_earned = date('Y-m-d h:m:s');
                $achievement->save();

                $notification = new Notification();
                $notification->user_id = Auth::user()->id;
                $notification->title = "SAVINGS GOAL ACHIEVED";
                $notification->content = $achievement->description;
                $notification->save();
            }
        }

        if($request['transaction_type'] == "WITHDRAW")
        {
            $goal->current_progress -= (int)$transaction->amount;
            $calc->principal_amount += (int)$transaction->amount;
            $savings_account->account_balance -= (int)$transaction->amount;
            $goal->save();
            $calc->save();
            $savings_account->save();

            $notification = new Notification();
            $notification->user_id = Auth::user()->id;
            $notification->title = "WITHDRAW SUCCESSFUL";
            $notification->content = "Your account has been debited with UGX $transaction->amount . Trans ID: $transaction->id ";
            $notification->save();
        }



        return redirect('/account-goal-savings-calculator');



    }


    public function show_add_financial_tip()
    {
        return view('dashboard.pages.tips.add_tips');
    }

    public function add_financial_tip(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $tip = new FinancialTip();
        $tip->title = $request['title'];
        $tip->content = $request['content'];
        $tip->save();


        return redirect('/account-financial-tips');
    }

    public function show_add_article()
    {
        return view('dashboard.pages.articles.add_articel');
    }



    public function add_article(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = new Article();
        $article->title = $request['title'];
        $article->content = $request['content'];
        $article->save();


        return redirect('/account-articles');
    }
}
