<div class="card">
    <div class="card-header bg-info">
        <h4 class="card-title">هزینه نهایی سفارش</h4>
    </div>
    <div class="card-body">
        <p>
            قیمت کل کالا: {{number_format($basket->calculateAmount())}} ریال
        </p>
        <p>
            هزین هارسال {{number_format($basket->transferAmount())}} ریال
        </p>
        <p>
            قیمت کل سفارش: {{number_format($basket->calculateAmount() + $basket->transferAmount())}} ریال
        </p>
        <a href="" class="btn btn-info w-100">ثبت سفارش</a>
    </div>
</div>