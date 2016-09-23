<div class="ribbon ribbon-bookmark ribbon-reverse ribbon-info">
    <?php $yearInCompany    = \Carbon\Carbon::now()->diffInYears($employee->created_at); ?>
    <?php $monthsInCompany  = \Carbon\Carbon::now()->diffInMonths($employee->created_at); ?>
    <?php $daysInCompany    = \Carbon\Carbon::now()->diffInDays($employee->created_at); ?>

    @if ($yearInCompany == 0 && $monthsInCompany == 0)
        <span class="ribbon-inner"><i class="fa fa-gift"></i> {{ "Miembro hace " . $daysInCompany . " día(s)" }}</span>
    @elseif ($yearInCompany == 0 && $monthsInCompany > 0)
        <span class="ribbon-inner"><i class="fa fa-gift"></i> {{ "Miembro hace " . $monthsInCompany . " mes(es)" }}</span>
    @else
        <span class="ribbon-inner"><i class="fa fa-gift"></i> {{ "Miembro hace " . $yearInCompany . " año(s)" }}</span>
    @endif

</div>