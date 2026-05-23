<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Services\GoalService;

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
        $query = Goal::query();

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

        $totalGoals = Goal::count();

        $totalTarget = Goal::sum(
            'target_amount'
        );

        $totalSaved = Goal::sum(
            'current_amount'
        );

        $completedGoals = Goal::where(
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

        $this->goalService
            ->createGoal($request->all());

        return redirect()
            ->route('goals.index');
    }

    public function show($id)
    {
        $goal = Goal::findOrFail($id);

        return view(
            'goals.detail',
            compact('goal')
        );
    }

    public function edit($id)
    {
        $goal = Goal::findOrFail($id);

        return view(
            'goals.edit',
            compact('goal')
        );
    }

    public function update(
        Request $request,
        $id
    ){
        $goal = Goal::findOrFail($id);

        $this->goalService
            ->updateGoal(
                $goal,
                $request->all()
            );

        return redirect()
            ->route('goals.index');
    }

    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);

        $this->goalService
            ->deleteGoal($goal);

        return redirect()
            ->route('goals.index');
    }
}