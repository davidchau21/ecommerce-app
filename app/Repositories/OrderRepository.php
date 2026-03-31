<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function createWithItems(User $user, array $orderData, array $items): Order
    {
        return DB::transaction(function () use ($user, $orderData, $items) {
            $order = $user->orders()->create($orderData);

            foreach ($items as $item) {
                $order->orderItems()->create($item);
            }

            return $order;
        });
    }

    public function getUserOrders(User $user, int $perPage = 15): LengthAwarePaginator
    {
        return $user->orders()->with('orderItems.product')->latest()->paginate($perPage);
    }

    public function getAllOrders(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->with(['user', 'orderItems.product'])->latest()->paginate($perPage);
    }

    public function updateStatus(int $id, string $status): bool
    {
        $order = $this->find($id);
        if ($order) {
            return $order->update(['status' => $status]);
        }
        return false;
    }
}
