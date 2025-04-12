@extends('layouts.app')

@section('title', 'Plans')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h1>Plans</h1>
            <p class="mb-4">Choose the plan that best fits your needs</p>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($plans as $plan)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $plan->plan_name }}</h5>
                        <h6 class="card-subtitle mb-3">${{ number_format($plan->price, 2) }}/month</h6>
                        
                        <ul class="list-unstyled mb-4">
                            @foreach($plan->features as $feature => $value)
                                <li class="mb-2">
                                    <i class="bi bi-check2"></i>
                                    @if(is_string($feature))
                                        <strong>{{ $feature }}:</strong> {{ $value }}
                                    @else
                                        {{ $value }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-auto">
                            @if($currentPlan && $currentPlan->id === $plan->id)
                                <button class="btn btn-success w-100" disabled>Current Plan</button>
                            @else
                                <form action="{{ route('plans.change') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <button type="submit" class="btn btn-primary w-100">Buy Now</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 