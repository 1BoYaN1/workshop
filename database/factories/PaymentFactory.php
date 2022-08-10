<?php

namespace Database\Factories;

use App\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat($maxDecimal = 2, $min = 15, $max = 500),
            'payed_at' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
        ];
    }
}
