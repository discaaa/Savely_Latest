<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SaveLy Expense</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body{
            background: #f3f4f6;
            overflow-x: hidden;
        }

        /* MAIN LAYOUT */
        .main-container{
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* SIDEBAR */
        .sidebar{
            width: 260px;
            min-width: 260px;

            background: linear-gradient(
                180deg,
                #b266ff,
                #8b5cf6
            );

            color: white;

            padding: 24px 20px;

            transition: 0.3s ease;

            overflow: hidden;
        }

        /* SIDEBAR CLOSED */
        .sidebar.closed{
            width: 90px;
            min-width: 90px;
        }

        /* TOP SIDEBAR */
        .sidebar-top{
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 55px;
        }

        /* LOGO */
        .logo{
            font-size: 34px;
            font-weight: 700;

            white-space: nowrap;

            transition: 0.2s ease;
        }

        .sidebar.closed .logo{
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        /* TOGGLE BUTTON */
        .toggle-btn{
            width: 44px;
            height: 44px;

            border: none;

            background: rgba(255,255,255,0.2);

            color: white;

            border-radius: 12px;

            cursor: pointer;

            font-size: 20px;

            transition: 0.2s ease;

            flex-shrink: 0;
        }

        .toggle-btn:hover{
            background: rgba(255,255,255,0.3);
        }

        /* MENU */
        .menu{
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu a{
            text-decoration: none;

            color: white;

            padding: 15px 18px;

            border-radius: 14px;

            font-size: 17px;

            transition: 0.25s ease;

            white-space: nowrap;
        }

        .menu a:hover{
            background: rgba(255,255,255,0.15);
        }

        .menu .active{
            background: white;
            color: #8b5cf6;
            font-weight: 700;
        }

        /* HIDE TEXT WHEN CLOSED */
        .sidebar.closed .menu a{
            font-size: 0;
            padding: 18px;
        }

        /* CONTENT */
        .content{
            flex: 1;

            padding: 22px;

            transition: 0.3s ease;
        }

        /* HEADER */
        .header{
            background: white;

            border-radius: 24px;

            padding: 30px 38px;

            margin-bottom: 24px;

            border-top: 8px solid #a855f7;

            box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        }

        .header h1{
            font-size: clamp(28px, 4vw, 40px);

            color: #222;

            margin-bottom: 8px;
        }

        .header p{
            color: #777;
            font-size: 15px;
        }

        /* FORM CARD */
        .form-card{
            background: white;

            border-radius: 24px;

            padding: 40px;

            box-shadow: 0 6px 20px rgba(0,0,0,0.06);

            width: 100%;
        }

        /* FORM ROW */
        .form-row{
            display: flex;

            align-items: flex-start;

            gap: 24px;

            margin-bottom: 28px;
        }

        .form-row label{
            width: 220px;
            min-width: 220px;

            font-size: 17px;

            font-weight: 600;

            color: #222;

            padding-top: 14px;
        }

        /* INPUT GROUP */
        .input-group{
            flex: 1;

            display: flex;
        }

        /* INPUT */
        .input-group input,
        .input-group select{
            width: 100%;

            height: 56px;

            border: 1px solid #d1d5db;

            border-right: none;

            border-radius: 14px 0 0 14px;

            padding: 0 18px;

            font-size: 15px;

            outline: none;

            transition: 0.2s ease;
        }

        .input-group input:focus,
        .input-group select:focus,
        textarea:focus{
            border-color: #a855f7;

            box-shadow: 0 0 0 3px rgba(168,85,247,0.15);
        }

        /* PURPLE BOX */
        .addon{
            width: 60px;

            background: #a855f7;

            border-radius: 0 14px 14px 0;
        }

        /* TEXTAREA */
        textarea{
            width: 100%;

            min-height: 180px;

            border: 1px solid #d1d5db;

            border-radius: 14px;

            padding: 16px 18px;

            font-size: 15px;

            resize: vertical;

            outline: none;

            transition: 0.2s ease;
        }

        /* BUTTON AREA */
        .button-area{
            display: flex;

            justify-content: flex-end;

            gap: 16px;

            margin-top: 40px;

            flex-wrap: wrap;
        }

        /* BUTTON */
        .submit-btn{
            background: linear-gradient(
                135deg,
                #b266ff,
                #8b5cf6
            );

            color: white;

            border: none;

            padding: 15px 38px;

            border-radius: 14px;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.25s ease;

            box-shadow: 0 6px 16px rgba(168,85,247,0.25);
        }

        .submit-btn:hover{
            transform: translateY(-2px);
        }

        .reset-btn{
            background: #ede9fe;

            color: #8b5cf6;

            border: 1px solid #d8b4fe;

            padding: 15px 38px;

            border-radius: 14px;

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            transition: 0.25s ease;
        }

        .reset-btn:hover{
            background: #ddd6fe;
        }

        /* TABLET */
        @media(max-width: 1000px){

            .form-row{
                flex-direction: column;
                gap: 10px;
            }

            .form-row label{
                width: 100%;
                min-width: 100%;
                padding-top: 0;
            }

        }

        /* MOBILE */
        @media(max-width: 768px){

            .main-container{
                flex-direction: column;
            }

            .sidebar{
                width: 100%;
                min-width: 100%;
            }

            .sidebar.closed{
                width: 100%;
                min-width: 100%;
            }

            .sidebar.closed .logo{
                opacity: 1;
                width: auto;
            }

            .sidebar.closed .menu a{
                font-size: 17px;
                padding: 15px 18px;
            }

            .content{
                padding: 14px;
            }

            .header{
                padding: 24px;
            }

            .form-card{
                padding: 24px 18px;
            }

            .button-area{
                justify-content: stretch;
            }

            .submit-btn,
            .reset-btn{
                width: 100%;
            }

        }

    </style>

</head>

<body>

<div class="main-container">

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">

        <!-- TOP -->
        <div class="sidebar-top">

            <div class="logo">
                SaveLy
            </div>

            <button
                class="toggle-btn"
                onclick="toggleSidebar()"
            >
                ☰
            </button>

        </div>

        <!-- MENU -->
        <div class="menu">

            <a href="#">
                Dashboard
            </a>

            <a href="#" class="active">
                Expense
            </a>

            <a href="#">
                Budget
            </a>

            <a href="#">
                Saving
            </a>

            <a href="#">
                Goals
            </a>

            <a href="#">
                Challenges
            </a>

            <a href="#">
                History
            </a>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- HEADER -->
        <div class="header">

            <h1>
                Add Expense
            </h1>

            <p>
                Manage and track your expenses efficiently
            </p>

        </div>

        <!-- FORM -->
        <div class="form-card">

            <form>

                <!-- CATEGORY -->
                <div class="form-row">

                    <label>
                        Category
                    </label>

                    <div class="input-group">

                        <select>

                            <option>
                                Select Category
                            </option>

                            <option>
                                Food
                            </option>

                            <option>
                                Transport
                            </option>

                            <option>
                                Shopping
                            </option>

                            <option>
                                Bills
                            </option>

                        </select>

                        <div class="addon"></div>

                    </div>

                </div>

                <!-- DESCRIPTION -->
                <div class="form-row">

                    <label>
                        Description
                    </label>

                    <div class="input-group">

                        <input type="text">

                        <div class="addon"></div>

                    </div>

                </div>

                <!-- DATE -->
                <div class="form-row">

                    <label>
                        Date
                    </label>

                    <div class="input-group">

                        <input type="date">

                        <div class="addon"></div>

                    </div>

                </div>

                <!-- AMOUNT -->
                <div class="form-row">

                    <label>
                        Amount
                    </label>

                    <div class="input-group">

                        <input type="number">

                        <div class="addon"></div>

                    </div>

                </div>

                <!-- PURPOSE -->
                <div class="form-row">

                    <label>
                        Expense Purpose
                    </label>

                    <textarea></textarea>

                </div>

                <!-- BUTTON -->
                <div class="button-area">

                    <button
                        type="submit"
                        class="submit-btn"
                    >
                        Submit
                    </button>

                    <button
                        type="reset"
                        class="reset-btn"
                    >
                        Reset
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

    function toggleSidebar(){

        const sidebar = document.getElementById('sidebar');

        sidebar.classList.toggle('closed');

    }

</script>

</body>
</html>