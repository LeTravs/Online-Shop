<?php

namespace Database\Factories;
use App\Models\Delivery;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $customerIds = Customer::pluck('id')->toArray();

        return [
            'customer_id' => $this->faker->randomElement($customerIds),
            'items_ordered' => $this->faker->sentence,
            'total_amount' => $this->faker->randomFloat(2, 10, 100),
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
