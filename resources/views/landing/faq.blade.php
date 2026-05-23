@extends('components.layout.navbar')

@section('content')

<style>

    body{
        background:
        radial-gradient(circle at top left, #e9d5ff 0%, transparent 30%),
        radial-gradient(circle at bottom right, #d8b4fe 0%, transparent 35%),
        linear-gradient(135deg,#f8f5ff,#ffffff);
        min-height: 100vh;
        overflow-x: hidden;
    }

    .faq-section{
        padding: 70px 90px;
    }

    .faq-title{
        font-size: 60px;
        font-weight: 900;
        color: #4c1d95;
    }

    .faq-desc{
        font-size: 21px;
        color: #5b21b6;
        line-height: 1.8;
        max-width: 750px;
        margin: auto;
    }

    .faq-card{
        background: rgba(255,255,255,0.4);
        backdrop-filter: blur(12px);
        border-radius: 28px;
        padding: 20px 28px;
        margin-bottom: 25px;
        border: 2px solid rgba(255,255,255,0.35);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .faq-card:hover{
        transform: translateY(-4px);
    }

    .accordion-button{
        background: transparent !important;
        box-shadow: none !important;
        font-size: 22px;
        font-weight: bold;
        color: #5b21b6;
        padding-left: 0;
    }

    .accordion-button:not(.collapsed){
        color: #4c1d95;
    }

    .accordion-body{
        color: #4b5563;
        font-size: 17px;
        line-height: 1.9;
        padding-left: 0;
    }

    .accordion-item{
        background: transparent;
        border: none;
    }

    .contact-box{
        margin-top: 80px;
        background: rgba(255,255,255,0.35);
        backdrop-filter: blur(10px);
        border-radius: 35px;
        padding: 50px;
        text-align: center;
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
    }

    .contact-title{
        font-size: 45px;
        font-weight: 900;
        color: #4c1d95;
    }

    .contact-desc{
        font-size: 20px;
        color: #5b21b6;
        line-height: 1.8;
    }

    .purple-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 18px;
        padding: 15px 35px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
        margin-top: 20px;
        box-shadow: 0 8px 20px rgba(111,44,255,0.25);
    }

    .purple-btn:hover{
        background: #5b21b6;
        transform: translateY(-3px);
        color: white;
    }

</style>

<div class="container-fluid faq-section">

    {{-- HEADER --}}
    <div class="text-center mb-5">

        <h1 class="faq-title">
            Frequently Asked Questions
        </h1>

        <p class="faq-desc mt-4">

            Find answers to common questions about SaveLy,
            including saving goals, budgeting, transactions,
            and account management.

        </p>

    </div>

    {{-- FAQ ACCORDION --}}
    <div class="accordion" id="faqAccordion">

        {{-- FAQ 1 --}}
        <div class="faq-card">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">

                        What is SaveLy?

                    </button>

                </h2>

                <div id="faq1"
                     class="accordion-collapse collapse show"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        SaveLy is a financial management platform
                        designed to help users manage expenses,
                        savings, budgeting, and financial goals
                        more effectively.

                    </div>

                </div>

            </div>

        </div>

        {{-- FAQ 2 --}}
        <div class="faq-card">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                        How do I create a saving goal?

                    </button>

                </h2>

                <div id="faq2"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        You can create a new goal by opening
                        the Goals page and clicking the
                        “+ New Goal” button.

                    </div>

                </div>

            </div>

        </div>

        {{-- FAQ 3 --}}
        <div class="faq-card">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">

                        Can I track my daily savings?

                    </button>

                </h2>

                <div id="faq3"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Yes. SaveLy provides a Daily Saving
                        feature to help you record and monitor
                        your saving habits consistently.

                    </div>

                </div>

            </div>

        </div>

        {{-- FAQ 4 --}}
        <div class="faq-card">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq4">

                        Is my financial data secure?

                    </button>

                </h2>

                <div id="faq4"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Yes. Your account information and
                        financial records are securely stored
                        and protected within the system.

                    </div>

                </div>

            </div>

        </div>

        {{-- FAQ 5 --}}
        <div class="faq-card">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq5">

                        Can I edit or delete goals?

                    </button>

                </h2>

                <div id="faq5"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Yes. Every goal can be updated,
                        edited, or deleted through the
                        Goal Detail or Edit page.

                    </div>

                </div>

            </div>

        </div>

        {{-- FAQ 6 --}}
        <div class="faq-card">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq6">

                        Does SaveLy support budgeting?

                    </button>

                </h2>

                <div id="faq6"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        Yes. SaveLy includes a Budget feature
                        that helps users control spending and
                        manage monthly financial plans.

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- CONTACT SECTION --}}
    <div class="contact-box">

        <h1 class="contact-title">
            Still Have Questions?
        </h1>

        <p class="contact-desc mt-4">

            If you still need help or have other questions,
            feel free to contact our support team anytime.

        </p>

        <a href="/login"
           class="purple-btn">

            Get Started

        </a>

    </div>

</div>

@endsection