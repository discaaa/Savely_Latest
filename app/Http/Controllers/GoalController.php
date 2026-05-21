<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Services\GoalService;

class GoalController extends Controller
{
    protected $goalService;

    public function __construct(GoalService $goalService)
    {
        $this->goalService = $goalService;
    }

    public function index()
    {
        $goals = $this->goalService
            ->getAllGoals();

        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $this->goalService
            ->createGoal($request->all());

        return redirect()
            ->route('goals.index');
    }

    public function show($id)
    {
        $goal = Goal::findOrFail($id);

        return view('goals.detail', compact('goal'));
    }

    public function edit($id)
    {
        $goal = Goal::findOrFail($id);

        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, $id)
    {
        $goal = Goal::findOrFail($id);

        $this->goalService
            ->updateGoal($goal, $request->all());

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