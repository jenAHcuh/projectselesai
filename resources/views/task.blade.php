@extends('layout.layout-task')

@section('page-css')

<link rel="stylesheet" href="{{ asset('css/task.css') }}">

@endsection


@section('content')

<div class="instruction-page">

    <div class="instruction-card">

        {{-- STEP 1 --}}
        <div class="instruction-step active">

            <h1>Welcome to the Study</h1>

            <p>
                Welcome and thank you for participating in this study.
            </p>

            <button type="button" class="instruction-btn next-btn">
                Next
            </button>

        </div>


        {{-- STEP 2 --}}
        <div class="instruction-step">

            <h1>Your Task</h1>

            <p>
                You will interact with an e-commerce website
                and complete a shopping task based on the
                instructions provided.
            </p>

            <button type="button" class="instruction-btn next-btn">
                Next
            </button>

        </div>


        {{-- STEP 3 --}}
        <div class="instruction-step">

            <h1>Task Instructions</h1>

            <p>
                Find a product that meets the requirements,
                compare it with another product, select the
                most suitable option, add it to your cart,
                and proceed through the checkout process.
            </p>

            <button type="button" class="instruction-btn next-btn">
                Next
            </button>

        </div>


        {{-- STEP 4 --}}
        <div class="instruction-step">

            <h1>You're Ready!</h1>

            <p>
                Please complete the task as naturally as
                you would when shopping online.
            </p>

            <p>
                Good luck and thank you for participating.
            </p>

          <button
    type="button"
    class="instruction-btn"
    id="start-experiment"
>
    Start Experiment
</button>

        </div>

    </div>

</div>

@endsection

@section('page-js')

<script>
document.addEventListener("DOMContentLoaded", function () {

    const steps = document.querySelectorAll(".instruction-step");
    const nextButtons = document.querySelectorAll(".next-btn");
    const startExperiment = document.getElementById("start-experiment");

    let currentStep = 0;

    function activateButton(step) {
        const button = step.querySelector(".instruction-btn");

        if (!button) return;

        button.classList.remove("ready");

        setTimeout(function () {
            button.classList.add("ready");
        }, 2000);
    }

    // Aktifkan tombol pada step pertama
    if (steps.length > 0) {
        activateButton(steps[currentStep]);
    }

    // Tombol Next
    nextButtons.forEach(function (button) {
        button.addEventListener("click", function () {

            if (!button.classList.contains("ready")) {
                return;
            }

            steps[currentStep].classList.remove("active");
            currentStep++;

            if (currentStep < steps.length) {
                steps[currentStep].classList.add("active");
                activateButton(steps[currentStep]);
            }
        });
    });

    // Start Experiment
    if (startExperiment) {
        startExperiment.addEventListener("click", async function (event) {

            event.preventDefault();

            if (!startExperiment.classList.contains("ready")) {
                return;
            }

            startExperiment.classList.remove("ready");
            startExperiment.style.pointerEvents = "none";

            try {
                const response = await fetch(
                    "{{ route('experiment.start') }}",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            condition: "normal"
                        })
                    }
                );

                if (!response.ok) {
                    throw new Error("Gagal membuat session eksperimen.");
                }

                // Reset timer promo hanya saat eksperimen dimulai
                sessionStorage.removeItem("experimentPromoEndTime");

                // Pindah ke halaman e-commerce
                window.location.href = "{{ route('home') }}";

            } catch (error) {
                console.error(error);
                alert("Eksperimen gagal dimulai. Silakan coba lagi.");

                startExperiment.classList.add("ready");
                startExperiment.style.pointerEvents = "";
            }
        });
    }

});
</script>

@endsection