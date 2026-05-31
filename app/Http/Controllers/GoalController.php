<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Services\GoalService;
use Illuminate\Support\Facades\Auth;
use App\Models\SavingTransaction;
use App\Models\Activity;
use App\Services\ChallengeService;

class GoalController extends Controller
{
    protected $goalService;

    public function __construct(
        GoalService $goalService
    ){
        $this->goalService = $goalService;
    }

    public function index()
    {
        $query = Goal::where(
            'user_id',
            Auth::id()
        );

        if(request('tab') == 'ongoing'){

            $query->where(
                'status',
                'ongoing'
            );
        }

        if(request('tab') == 'completed'){

            $query->where(
                'status',
                'completed'
            );
        }

        $goals = $query
            ->latest()
            ->get();

        $totalGoals = Goal::where(
            'user_id',
            Auth::id()
        )->count();

        $totalTarget = Goal::where(
            'user_id',
            Auth::id()
        )->sum(
            'target_amount'
        );

        $totalSaved = Goal::where(
            'user_id',
            Auth::id()
        )->sum(
            'current_amount'
        );

        $completedGoals = Goal::where(
            'user_id',
            Auth::id()
        )->where(
            'status',
            'completed'
        )->count();

        return view(
            'goals.index',
            compact(
                'goals',
                'totalGoals',
                'totalTarget',
                'totalSaved',
                'completedGoals'
            )
        );
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:100',

            'target_amount' => 'required|numeric|min:1',

        ]);

        $data = $request->all();

        $data['user_id'] = Auth::id();

        $goal = $this->goalService->createGoal($data);

        Activity::create([

            'title' => 'Goal Created',

            'description' =>
                'You created a new goal: '
                . $goal->title

        ]);

        return redirect()
            ->route('goals.index')->with('success', 'Goal created successfully!');
    }

    public function show($id)
    {
        $goal = Goal::where(
            'user_id',
            Auth::id()
        )->findOrFail($id);

        $transactions = SavingTransaction::where(
                'goal_id',
                $goal->id
            )
            ->latest()
            ->get();

        return view(
            'goals.detail',
            compact('goal', 'transactions')
        );
    }

    public function edit($id)
    {
        $goal = Goal::where(
            'user_id',
            Auth::id()
        )->findOrFail($id);

        return view(
            'goals.edit',
            compact('goal')
        );
    }

    public function update(
        Request $request,
        $id
    ){

        $goal = Goal::where(
            'user_id',
            Auth::id()
        )->findOrFail($id);
        $oldStatus = $goal->status;
        $this->goalService
            ->updateGoal(
                $goal,
                $request->all()
            );
        $goal->refresh();
        if (
            $oldStatus != 'completed'
            &&
            $goal->status == 'completed'
        ) {

            ChallengeService::completeGoalChallenge(
                Auth::user()
            );

            Activity::create([

                'title' => 'Goal Completed',

                'description' =>
                    'You completed goal: '
                    . $goal->title

            ]);
        }

        Activity::create([

            'title' => 'Goal Updated',

            'description' =>
                'You updated goal: '
                . $goal->title

        ]);        

        return redirect()
            ->route('goals.index')->with('success', 'Goal updated successfully!');
    }

    public function destroy($id)
    {
        $goal = Goal::where(
            'user_id',
            Auth::id()
        )->findOrFail($id);

        $this->goalService
            ->deleteGoal($goal);

        return redirect()
            ->route('goals.index');
    }

}