<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Carrier;
use App\Entity\Category;
use App\Entity\Detail;
use App\Entity\Order;
use App\Entity\Product;
use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $user = new User();
        $password = $this->hasher->hashPassword($user, 'user');
        $user->setEmail('default@fixture.com')
             ->setFirstname($faker->firstName(null))
             ->setLastname($faker->lastName())
             ->setPassword($password);
        $manager->persist($user);


        for ($i=0; $i < 11; $i++) { 
            $category = new Category();
            $category->setName($faker->words(1, true));
            $manager->persist($category);

            for ($j=0; $j < 31; $j++) { 
                $product = new Product();
                $product->setName($faker->words(1, true))
                        ->setCategory($category)
                        ->setDescription($faker->paragraphs(10, true))
                        ->setImage('/img/fixtures/default.jpg')
                        ->setIsBest($faker->randomElement([false, true]))
                        ->setIsPromo($faker->randomElement([true, false]))
                        ->setPrice($faker->numberBetween(30, 999))
                        ->setSlug($faker->slug(1, false));
                $manager->persist($product);
            }
        }

        for ($j=0; $j < 4; $j++) { 
            $carrier = new Carrier();
            $carrier->setName($faker->company())
                    ->setPrice($faker->numberBetween(3, 30));
            $manager->persist($carrier);
        }

        for ($j=0; $j < 4; $j++) { 
            $address = new Address();
            $address->setAddress($faker->streetAddress())
                    ->setCity($faker->city())
                    ->setCountry($faker->countryCode())
                    ->setZipcode($faker->postcode())
                    ->setCompany($faker->randomElement([null, $faker->company()]))
                    ->setPhone($faker->phoneNumber())
                    ->setUser($user);
            $manager->persist($address);
        }

        for ($j=0; $j < 4; $j++) { 
            $order = new Order();
            $date = new \DateTime();
            $order->setReference($date->format('mY').''.uniqid())
                  ->setAddress($faker->address())
                  ->setCarrierName($carrier->getName())
                  ->setCarrierPrice($carrier->getPrice())
                  ->setCreatedAt($faker->dateTimeBetween('-1 year', 'now'))
                  ->setState($faker->randomElement([1, 2, 3]))
                  ->setStripe($faker->randomElement([null, $faker->words(1, true)]))
                  ->setUser($user);
            $manager->persist($order);

            for ($j=0; $j < 5; $j++) { 
                $detail = new Detail();
                $detail->setOrders($order)
                        ->setPrice($product->getPrice())
                        ->setProduct($product->getName())
                        ->setQte($faker->randomDigitNotNull())
                        ->setTotal($faker->randomDigitNotNull() * $product->getPrice());
                $manager->persist($detail);
            }
        }
        $manager->flush();
    }
}
