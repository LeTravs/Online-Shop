<?php

namespace Database\Factories;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customers = Customer::pluck('id')->toArray();

        return [
            'customer_id' => $this->faker->randomElement($customers),
            'items_ordered' => $this->faker->sentence,
            'total_amount' => $this->faker->randomFloat(2, 10, 100),
            'order_status' => $this->faker->randomElement(['pending', 'processing', 'shipped']),

        ];
}


}
