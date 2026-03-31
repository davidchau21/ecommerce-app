<?php

namespace App\Repositories\Contracts;

use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface OrderRepositoryInterface
{
    public function createWithItems(User $user, array $orderData, array $items): Order;
    public function getUserOrders(User $user, int $perPage = 15): LengthAwarePaginator;
    public function getAllOrders(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Order;
    public function updateStatus(int $id, string $status): bool;
}
