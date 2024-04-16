<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * The name of the factory's definition.
     *
     * @var string
     */
    protected string $name = 'Profile';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'avatar' => null,
            'balance' => 0,
            'user_id' => User::factory(),
        ];
    }

    /**
     * Configure the factory to create social media accounts for each profile.
     *
     * @return self
     */
    public function withSocialMedia(): self
    {
        return $this->afterCreating(function (Profile $profile) {
            $socialMediaData = [
                [
                    'profile_id' => $profile->id,
                    'name' => 'Instagram',
                    'profile_url' => 'https://www.instagram.com/' . $profile->first_name,
                    'username' => $profile->first_name,
                ],
                [
                    'profile_id' => $profile->id,
                    'name' => 'Facebook',
                    'profile_url' => 'https://www.facebook.com/' . $profile->first_name,
                    'username' => $profile->first_name,
                ],
                [
                    'profile_id' => $profile->id,
                    'name' => 'Telegram',
                    'profile_url' => 'https://t.me/' . $profile->first_name,
                    'username' => $profile->first_name,
                ]
            ];

            foreach ($socialMediaData as $data) {
                SocialMedia::create($data);
            }
        });
    }
}
