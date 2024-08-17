<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender and Development Accomplishment Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h3, h4, h5, h6 {
            text-align: center;
            margin: 0;
            padding: 1px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 1px;
            text-align: left;

            font-size: 7px; /* Adjust font size to fit more data */
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .border {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3>Department of Social Welfare and Development</h3>
    <h4>Gender and Development Accomplishment Report</h4>
    <h5>FY 
        <?php $__currentLoopData = $gadar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key === 0): ?>
                <?php echo e($g->year); ?>,
                <?php echo e(ordinal($g->quarter)); ?> Quarter
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </h5>
    <h6>Field Office Caraga</h6>
    </br>
    </br>
    <table class="border" >
        <thead>
            <tr>
                <th class="border" rowspan="3">ID</th>
                <th class="border" rowspan="3">Gender Issue or GAD Mandate</th>
                <th class="border" rowspan="3">Result Indicator</th>
                <th class="border" colspan="4">Results</th>
                <th class="border" colspan="4" rowspan="2">Actual</th>
                <th class="border" colspan="2">PREXC</th>
                <th class="border" rowspan="3">GAD Activity</th>
                <th class="border" rowspan="3">Actual GAD activities</th>
                <th class="border" colspan="3" rowspan="2">GAD Budget</th>
                <th class="border" colspan="3" rowspan="2">GAD Expenditure</th>
                <th class="border" rowspan="3">Source</th>
                <th class="border" rowspan="3">Responsible Unit</th>
                <th class="border" rowspan="3">Remark / Justification</th>
            </tr>
            <tr>
                <th class="border" rowspan="2">Previous Year Accomplishment (FY 2022 Accomplishment)</th>
                <th class="border" colspan="3">For 
                    <?php $__currentLoopData = $gadar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key === 0): ?>
                            <?php echo e($g->year); ?>

                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     Target</th>
                <th class="border" rowspan="2">PAP Description</th>
                <th class="border" rowspan="2">PAP ID</th>
            </tr>
            <tr>
                <th class="border">Male</th>
                <th class="border">Female</th>
                <th class="border">Total</th>
                <th class="border">Male</th>
                <th class="border">Female</th>
                <th class="border">Other</th>
                <th class="border">Total</th>
                <th class="border">Tier One</th>
                <th class="border">Tier Two</th>
                <th class="border">Total Amount</th>
                <th class="border">Tier One</th>
                <th class="border">Tier Two</th>
                <th class="border">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <th class="border p-1" colspan="24" style="background-color: #9fdac4; text-align: left;">A. Client-Focused</th>
            </tr>
             <?php
                $totalBudgetAmountCategory1 = 0;
                $totalActualExpenditureCategory1 = 0;

                $totalBudgetAmountCategory2 = 0;
                $totalActualExpenditureCategory2 = 0;

                $totalBudgetAmountCategory3 = 0;
                $totalActualExpenditureCategory3 = 0;
            ?>

            <?php $__currentLoopData = $gadar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $fontSize = '8px'; // Default font size

                    switch (auth()->user()->level_id) {
                        case 1:
                            $fontSize = '9px';
                            break;
                        case 2:
                            $fontSize = '9px';
                            break;
                        case 3:
                            $fontSize = '9px';
                            break;
                        default:
                            $fontSize = '9px';
                            break;
                    }
                ?>
                <?php if($item->gadcategory_id == 1): ?>
                    <tr style="font-size: <?php echo e($fontSize); ?>;">
                        <td class="border"><?php echo e($item->indicator_code); ?></td>
                        <td class="border"><?php echo e($item->gad_mandate); ?></td>
                        <td class="border"><?php echo e($item->result_indicator); ?></td>
                        <td class="border"><?php echo e($item->prev_totalsex); ?></td>
                        <td class="border"><?php echo e($item->target_male); ?></td>
                        <td class="border"><?php echo e($item->target_female); ?></td>
                        <td class="border"><?php echo e($item->target_totalsex); ?></td>
                        <td class="border"><?php echo e($item->physical_male); ?></td>
                        <td class="border"><?php echo e($item->physical_female); ?></td>
                        <td class="border"><?php echo e($item->physical_other); ?></td>
                        <td class="border"><?php echo e($item->physical_sextotal); ?></td>
                        <td class="border"><?php echo e($item->pap_desc); ?></td>
                        <td class="border"><?php echo e($item->pap_code); ?></td>
                        <td class="border"><?php echo e($item->gad_activity); ?></td>
                        <td class="border"><?php echo e($item->gadar_actualactivity); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_tierone, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_tiertwo, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_totalamount, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->tierone_actual, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->tiertwo_actual, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->total_actualexpen, 2)); ?></td>
                        <td class="border"><?php echo e($item->source); ?></td>
                        <td class="border"><?php echo e($item->rawresponsible_unit); ?></td>
                        <td class="border"><?php echo e($item->justification1); ?></td>
                    </tr>
                    <?php
                        $totalBudgetAmountCategory1 += $item->budget_totalamount;
                        $totalActualExpenditureCategory1 += $item->total_actualexpen;
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr style="font-size: 12px;">
                <th class="border p-1" colspan="17" style="vertical-align: middle; text-align:left;">Sub-Total A</th>
                <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1"><?php echo e(number_format($totalBudgetAmountCategory1, 2)); ?></th>
                <th colspan="2"></th>
                <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1"><?php echo e(number_format($totalActualExpenditureCategory1, 2)); ?></th>
                <th class="border p-1" colspan="3"></th>
            </tr>
            <tr style="font-size: 12px;">
               <th class="border p-1" colspan="24" style="background-color: #9fdac4; text-align: left;">B. Organization-Focused</th>
            </tr>
            <?php
                $totalBudgetAmountCategory2 = 0;
                $totalActualExpenditureCategory2 = 0;
            ?>

            <?php $__currentLoopData = $gadar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $fontSize = '10px'; // Default font size

                    switch ($item->level_id) {
                        case 1:
                            $fontSize = '8px';
                            break;
                        case 2:
                            $fontSize = '10px';
                            break;
                        case 3:
                            $fontSize = '12px';
                            break;
                        case 4:
                            $fontSize = '14px';
                            break;
                        case 5:
                            $fontSize = '16px';
                            break;
                        default:
                            $fontSize = '10px';
                            break;
                    }
                ?>
                <?php if($item->gadcategory_id == 2): ?>
                    <tr style="font-size: <?php echo e($fontSize); ?>;">
                        <td class="border"><?php echo e($item->indicator_code); ?></td>
                        <td class="border"><?php echo e($item->gad_mandate); ?></td>
                        <td class="border"><?php echo e($item->result_indicator); ?></td>
                        <td class="border"><?php echo e($item->prev_totalsex); ?></td>
                        <td class="border"><?php echo e($item->target_male); ?></td>
                        <td class="border"><?php echo e($item->target_female); ?></td>
                        <td class="border"><?php echo e($item->target_totalsex); ?></td>
                        <td class="border"><?php echo e($item->physical_male); ?></td>
                        <td class="border"><?php echo e($item->physical_female); ?></td>
                        <td class="border"><?php echo e($item->physical_other); ?></td>
                        <td class="border"><?php echo e($item->physical_sextotal); ?></td>
                        <td class="border"><?php echo e($item->pap_desc); ?></td>
                        <td class="border"><?php echo e($item->pap_code); ?></td>
                        <td class="border"><?php echo e($item->gad_activity); ?></td>
                        <td class="border"><?php echo e($item->gadar_actualactivity); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_tierone, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_tiertwo, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_totalamount, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->tierone_actual, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->tiertwo_actual, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->total_actualexpen, 2)); ?></td>
                        <td class="border"><?php echo e($item->source); ?></td>
                        <td class="border"><?php echo e($item->rawresponsible_unit); ?></td>
                        <td class="border"><?php echo e($item->justification1); ?></td>
                    </tr>
                    <?php
                        $totalBudgetAmountCategory2 += $item->budget_totalamount;
                        $totalActualExpenditureCategory2 += $item->total_actualexpen;
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr style="font-size: 12px;">
                <th class="border p-1" colspan="17" style="vertical-align: middle; text-align:left;">Sub-Total B</th>
                <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1"><?php echo e(number_format($totalBudgetAmountCategory2, 2)); ?></th>
                <th colspan="2"></th>
                <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1"><?php echo e(number_format($totalActualExpenditureCategory2, 2)); ?></th>
                <th class="border p-1" colspan="3"></th>
            </tr>
            <tr style="font-size: 12px;">
               <th class="border p-1" colspan="24" style="background-color: #9fdac4; text-align: left;">C. GAD-Attributed Programs or Projects</th>
            </tr>
            <?php
                $totalBudgetAmountCategory3 = 0;
                $totalActualExpenditureCategory3 = 0;
            ?>

            <?php $__currentLoopData = $gadar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $fontSize = '10px'; // Default font size

                    switch ($item->level_id) {
                        case 1:
                            $fontSize = '8px';
                            break;
                        case 2:
                            $fontSize = '10px';
                            break;
                        case 3:
                            $fontSize = '12px';
                            break;
                        case 4:
                            $fontSize = '14px';
                            break;
                        case 5:
                            $fontSize = '16px';
                            break;
                        default:
                            $fontSize = '10px';
                            break;
                    }
                ?>
                <?php if($item->gadcategory_id == 3): ?>
                    <tr style="font-size: <?php echo e($fontSize); ?>;">
                        <td class="border"><?php echo e($item->indicator_code); ?></td>
                        <td class="border"><?php echo e($item->gad_mandate); ?></td>
                        <td class="border"><?php echo e($item->result_indicator); ?></td>
                        <td class="border"><?php echo e($item->prev_totalsex); ?></td>
                        <td class="border"><?php echo e($item->target_male); ?></td>
                        <td class="border"><?php echo e($item->target_female); ?></td>
                        <td class="border"><?php echo e($item->target_totalsex); ?></td>
                        <td class="border"><?php echo e($item->physical_male); ?></td>
                        <td class="border"><?php echo e($item->physical_female); ?></td>
                        <td class="border"><?php echo e($item->physical_other); ?></td>
                        <td class="border"><?php echo e($item->physical_sextotal); ?></td>
                        <td class="border"><?php echo e($item->pap_desc); ?></td>
                        <td class="border"><?php echo e($item->pap_code); ?></td>
                        <td class="border"><?php echo e($item->gad_activity); ?></td>
                        <td class="border"><?php echo e($item->gadar_actualactivity); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_tierone, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_tiertwo, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->budget_totalamount, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->tierone_actual, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->tiertwo_actual, 2)); ?></td>
                        <td class="border"><?php echo e(number_format($item->total_actualexpen, 2)); ?></td>
                        <td class="border"><?php echo e($item->source); ?></td>
                        <td class="border"><?php echo e($item->rawresponsible_unit); ?></td>
                        <td class="border"><?php echo e($item->justification1); ?></td>
                    </tr>
                    <?php
                        $totalBudgetAmountCategory3 += $item->budget_totalamount;
                        $totalActualExpenditureCategory3 += $item->total_actualexpen;
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr style="font-size: 12px;">
                <th class="border p-1" colspan="17" style="vertical-align: middle; text-align:left;">Sub-Total C</th>
                <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1"><?php echo e(number_format($totalBudgetAmountCategory3, 2)); ?></th>
                <th colspan="2"></th>
                <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1"><?php echo e(number_format($totalActualExpenditureCategory3, 2)); ?></th>
                <th class="border p-1" colspan="3"></th>
            </tr>
            <?php
                $grandTotalBudgetAmount = $totalBudgetAmountCategory1 + $totalBudgetAmountCategory2 + $totalBudgetAmountCategory3;
                $grandTotalActualExpenditure = $totalActualExpenditureCategory1 + $totalActualExpenditureCategory2 + $totalActualExpenditureCategory3;
            ?>
            <tr style="font-size: 14px;">
               <th class="border p-1" colspan="17" style="vertical-align: middle; text-align:left;"><strong>Grand Total</strong></th>
               <th class="border p-1" style="text-align: center; vertical-align: middle; padding: 4px;" colspan="1"><?php echo e(number_format($grandTotalBudgetAmount, 2)); ?></th>
               <th class="border" colspan="2"></th>
               <th class="border p-1" style="text-align: center; vertical-align: middle; padding: 4px;" colspan="1"><?php echo e(number_format($grandTotalActualExpenditure, 2)); ?></th>
               <th class="border p-1" colspan="3"></th>
            </tr>
        </tbody>
    </table>
    </br>
    </br>
    <table style="border:none; background-color: 0;">
        <thead style="border:none;">
            <tr>
                <td  style="border:none; font-size: 10px" colspan="8">Prepared by:</td>
                <td  style="border:none; font-size: 10px" colspan="14">Approved by:</td>
            </tr>
        </thead>
        <br>
        <br>
        <br>
        <tbody>
            <?php
                $middleName = auth()->user()->mname;
                $middleInitial = $middleName ? strtoupper($middleName[0]) . '.' : '';
            ?>
            <tr>
                <td style="border:none; font-size: 10px" colspan="8"><strong><?php echo e(auth()->user()->fname); ?> <?php echo e($middleInitial); ?>  <?php echo e(auth()->user()->lname); ?></strong></td>
                <td style="border:none; font-size: 10px" colspan="14"><strong>Mari-Flor A. Dollaga-Libang</strong></td>
            </tr>
            <tr>    
                
                <td style="border:none; font-size: 10px" colspan="8">PO I/ GAD Secretariat</td>
                <td style="border:none; font-size: 10px" colspan="14">Regional Director</td>
            </tr>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\laragon\www\grip.dswd.gov.ph\resources\views/pages/gadar/my_pdf.blade.php ENDPATH**/ ?>