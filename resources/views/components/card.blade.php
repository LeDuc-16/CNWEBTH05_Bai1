<div class="card">
    <div class="card-header">
        {{ $title ?? 'Default Title' }} <!-- Đây là một optional variable -->
    </div>
    <div class="card-body">
        {{ $slot }} <!-- Vị trí sẽ hiển thị nội dung động -->
    </div>
</div>
