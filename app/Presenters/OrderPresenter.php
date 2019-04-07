<?php


namespace App\Presenters;


use App\Models\Orders\OrdersStatus;
use App\Presenters\Contract\Presenter;
use App\Services\JalaliDate\JalaliDate;
use Hekmatinasser\Verta\Verta;

class OrderPresenter extends Presenter
{
    public function showDateInJalali()
    {
        $currentDate = $this->created_at;
        return JalaliDate::get_date_in_jalali_without_time($currentDate);
    }

    public function showNicePrice()
    {
        return number_format($this->payable_amount) . ' تومان ';
    }

    public function showOrderNumber()
    {
        return 'NS-' . $this->orderNumber;
    }

    public function showStatus()
    {
        $orderStatus = $this->status;
        if($orderStatus==0){
            echo '<a class="btn btn-success" href="'.route('user.orders.pay',[$this->id]).'"
"  >پرداخت کنید</a>  ';
        }else{
            return OrdersStatus::getOrderStatus($orderStatus);
        }
    }
}
