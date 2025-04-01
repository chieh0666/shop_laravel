<!-- 廣告或公告事項通知 -->
@if (isset($announcement->is_active))

<div class="notify text-center text-danger py-03125 fs-5 @if ($announcement->is_active == 0 || $announcement->count() == 0) py-15625 @endif">
  @if ($announcement->is_active == 1)
  <span class="fw-bolder">{{ $announcement->title }}</span>
  @endif
</div>

@else

<div class="py-15625">
</div>

@endif