@extends('layouts.app')

@section('content')

<style>

*{
    box-sizing:border-box;
}

body{
    background:#f3f4f6;
}

/* TOP BAR */
.topbar{
    background:white;

    border-radius:18px;

    padding:20px 30px;

    margin-bottom:22px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.topbar h1{
    font-size:30px;
    color:#333;
}

/* PROGRESS */
.progress-card{
    background:white;

    border:2px solid #a855f7;

    border-radius:22px;

    padding:24px;

    margin-bottom:22px;

    display:flex;

    gap:30px;

    align-items:center;

    flex-wrap:wrap;
}

.circle{
    width:120px;
    height:120px;

    border-radius:50%;

    border:8px solid #a855f7;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

    color:#8b5cf6;

    font-weight:bold;
}

.circle h2{
    font-size:34px;
}

.progress-text h2{
    font-size:32px;

    margin-bottom:10px;
}

.progress-text p{
    margin-bottom:8px;

    color:#7c3aed;

    font-weight:600;
}

/* GRID */
.challenge-grid{
    display:grid;

    grid-template-columns:2fr 1fr;

    gap:22px;

    margin-bottom:22px;
}

/* CARD */
.card{
    background:white;

    border:2px solid #a855f7;

    border-radius:22px;

    padding:22px;
}

/* TITLE */
.card-title{
    font-size:34px;

    font-weight:bold;

    margin-bottom:10px;

    text-align:center;
}

/* STREAK */
.streak-sub{
    text-align:center;

    color:#7c3aed;

    font-weight:600;

    margin-bottom:20px;
}

.streak-box{
    display:flex;

    gap:20px;

    flex-wrap:wrap;

    align-items:center;
}

.fire-box{
    width:140px;
    height:140px;

    background:#f3f4f6;

    border-radius:14px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:70px;
}

.streak-info{
    flex:1;
}

.streak-info p{
    margin-bottom:10px;

    font-weight:600;

    color:#6d28d9;
}

.save-btn{
    background:#c084fc;

    color:white;

    border:none;

    padding:12px 24px;

    border-radius:999px;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;

    transition:0.2s;
}

.save-btn:hover{
    transform:translateY(-2px);
}

.week{
    margin-top:20px;
}

.week-circle{
    display:flex;

    gap:12px;

    margin-top:10px;
}

.day{
    width:30px;
    height:30px;

    border-radius:50%;

    border:2px solid #a855f7;

    background:#a855f7;
}

.day.empty{
    background:transparent;
}

/* ACTIVITY */
.activity-item{
    background:#f3e8ff;

    border:1px solid #a855f7;

    border-radius:16px;

    padding:14px;

    margin-bottom:14px;
}

.activity-item h4{
    margin-bottom:6px;

    color:#6d28d9;
}

.activity-item p{
    font-size:13px;

    color:#666;
}

/* ACTIVE CHALLENGE */
.challenge-section{
    background:white;

    border:2px solid #a855f7;

    border-radius:22px;

    padding:22px;

    margin-bottom:22px;
}

.challenge-section h2{
    text-align:center;

    font-size:36px;

    margin-bottom:10px;
}

.challenge-sub{
    text-align:center;

    color:#7c3aed;

    margin-bottom:24px;

    font-weight:600;
}

.challenge-cards{
    display:grid;

    grid-template-columns:
        repeat(auto-fit,minmax(220px,1fr));

    gap:20px;
}

.challenge-card{
    background:#f3e8ff;

    border-radius:18px;

    padding:20px;

    text-align:center;
}

.challenge-card h3{
    color:#6d28d9;

    margin-bottom:14px;
}

.challenge-card p{
    margin-bottom:14px;

    line-height:1.6;
}

.reward{
    margin-bottom:16px;

    color:#444;
}

.status-btn{
    background:#a855f7;

    color:white;

    padding:12px;

    border-radius:999px;

    font-weight:bold;
}

/* STORE */
.store{
    background:white;

    border:2px solid #a855f7;

    border-radius:22px;

    padding:22px;
}

.store h2{
    text-align:center;

    font-size:36px;

    margin-bottom:10px;
}

.store-sub{
    text-align:center;

    color:#7c3aed;

    margin-bottom:24px;

    font-weight:600;
}

.store-grid{
    display:grid;

    grid-template-columns:
        repeat(auto-fit,minmax(200px,1fr));

    gap:20px;
}

.store-item{
    background:#f3e8ff;

    border-radius:18px;

    padding:20px;

    text-align:center;
}

.store-image{
    width:120px;
    height:120px;

    margin:auto;

    border-radius:50%;

    background:#ddd6fe;

    margin-bottom:16px;
}

.store-item h3{
    margin-bottom:14px;

    color:#6d28d9;
}

.price{
    background:#a855f7;

    color:white;

    padding:12px;

    border-radius:999px;

    font-weight:bold;
}

/* RESPONSIVE */
@media(max-width:1100px){

    .challenge-grid{
        grid-template-columns:1fr;
    }

}

@media(max-width:768px){

    .topbar{
        flex-direction:column;
        gap:15px;
        align-items:flex-start;
    }

    .progress-card{
        flex-direction:column;
        align-items:flex-start;
    }

    .streak-box{
        flex-direction:column;
        align-items:flex-start;
    }

}

</style>

<!-- TOP -->
<div class="topbar">

    <h1>
        Earn Points by Completing Challenges
    </h1>

</div>

<!-- PROGRESS -->
<div class="progress-card">

    <div class="circle">

        <h2>
            80%
        </h2>

        <small>
            750 pts remaining
        </small>

    </div>

    <div class="progress-text">

        <h2>
            Your Progress To Next Level
        </h2>

        <p>
            Points: 1,250 pts
        </p>

        <p>
            Level: Level 3 — Smart Saver
        </p>

        <p>
            You're doing great! Keep saving to level up.
        </p>

    </div>

</div>

<!-- GRID -->
<div class="challenge-grid">

    <!-- STREAK -->
    <div class="card">

        <div class="card-title">
            Streak
        </div>

        <div class="streak-sub">
            Save your money everyday to build your Streak!
        </div>

        <div class="streak-box">

            <div class="fire-box">
                700
            </div>

            <div class="streak-info">

                <p>
                    Longest Streak: 20 days
                </p>

                <p>
                    Ongoing: 16 days
                </p>

                <button class="save-btn">
                    Save your money
                </button>

            </div>

        </div>

        <div class="week">

            <strong>
                This Week :
            </strong>

            <div class="week-circle">

                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>
                <div class="day"></div>

                <div class="day empty"></div>
                <div class="day empty"></div>
                <div class="day empty"></div>

            </div>

        </div>

    </div>

    <!-- RECENT -->
    <div class="card">

        <div class="card-title">
            Recent Activity
        </div>

        <div class="activity-item">

            <h4>
                Completed a challenge
            </h4>

            <p>
                Congratulations! You completed a challenge and earned 100 pts
            </p>

        </div>

        <div class="activity-item">

            <h4>
                Built a Streak!
            </h4>

            <p>
                Congratulations! You just built a new streak
            </p>

        </div>

        <div class="activity-item">

            <h4>
                Made a Goal!
            </h4>

            <p>
                Congratulations! You made a goal
            </p>

        </div>

        <div class="activity-item">

            <h4>
                Save Money!
            </h4>

            <p>
                Congratulations! You saved 100k today
            </p>

        </div>

    </div>

</div>

<!-- ACTIVE CHALLENGES -->
<div class="challenge-section">

    <h2>
        Active Challenges
    </h2>

    <div class="challenge-sub">
        2/3 active challenges in progress
    </div>

    <div class="challenge-cards">

        <div class="challenge-card">

            <h3>
                No Spend Day
            </h3>

            <p>
                Don't spend money for 1 day
            </p>

            <div class="reward">
                Reward: +100 pts
            </div>

            <div class="status-btn">
                Ongoing
            </div>

        </div>

        <div class="challenge-card">

            <h3>
                Save 100k
            </h3>

            <p>
                Save Rp100.000 this week
            </p>

            <div class="reward">
                Reward: +80 pts
            </div>

            <div class="status-btn">
                Ongoing
            </div>

        </div>

        <div class="challenge-card">

            <h3>
                Tracking Daily
            </h3>

            <p>
                Track expenses for 7 days
            </p>

            <div class="reward">
                Reward: +125 pts
            </div>

            <div class="status-btn">
                Start
            </div>

        </div>

    </div>

</div>

<!-- STORE -->
<div class="store">

    <h2>
        Store
    </h2>

    <div class="store-sub">
        Exchange your points here!
    </div>

    <div class="store-grid">

        <div class="store-item">

            <div class="store-image"></div>

            <h3>
                Cat Border
            </h3>

            <div class="price">
                3000 pts
            </div>

        </div>

        <div class="store-item">

            <div class="store-image"></div>

            <h3>
                Floral Border
            </h3>

            <div class="price">
                3000 pts
            </div>

        </div>

        <div class="store-item">

            <div class="store-image"></div>

            <h3>
                Panda Avatar
            </h3>

            <div class="price">
                3000 pts
            </div>

        </div>

    </div>

</div>

@endsection