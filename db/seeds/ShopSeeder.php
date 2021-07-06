<?php


use Phinx\Seed\AbstractSeed;

class ShopSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $sql = 'TRUNCATE basket';
        $this->adapter->query($sql);

        $products = [
            [
                'name' => 'Пельмени',
                'description' => 'Куринные',
                'price' => '78'
            ],
            [
                'name' => 'Пицца',
                'description' => 'С сыром',
                'price' => '12'
            ],
            [
                'name' => 'Пончики',
                'description' => 'Свежие',
                'price' => '34'
            ]
        ];

        $this->table('products')->insert($products)->save();

        $users = [
            'login' => 'admin',
            'pass' => password_hash('123', PASSWORD_DEFAULT)
        ];

        $this->table('users')->insert($users)->save();
    }
}
