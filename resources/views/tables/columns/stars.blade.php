<div style="color: #ecc85f">
    @if($getState() > 0)
        {!! str_repeat('<i class="bi bi-star-fill"></i>', $getState()) !!}
        {!! str_repeat('<i class="bi bi-star"></i>', 5 - $getState()) !!}
    @endif
</div>
