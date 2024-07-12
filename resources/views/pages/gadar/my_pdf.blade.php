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

            font-size: 8px; /* Adjust font size to fit more data */
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
    <h5>FY 2024</h5>
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
                <th class="border" colspan="3" rowspan="2">Actual</th>
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
                <th class="border" colspan="3">For 2024 Target</th>
                <th class="border" rowspan="2">PAP Description</th>
                <th class="border" rowspan="2">PAP ID</th>

            </tr>
            <tr>
                <th class="border">Male</th>
                <th class="border">Female</th>
                <th class="border">Total</th>
                <th class="border">Male</th>
                <th class="border">Female</th>
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
            @foreach ($gadar as $item)
                <tr>
                    <td class="border">{{ $item->indicator_code }}</td>
                    <td class="border">{{ $item->gad_mandate }}</td>
                    <td class="border">{{ $item->result_indicator }}</td>
                    <td class="border">{{ $item->prev_totalsex }}</td>
                    <td class="border">{{ $item->target_male }}</td>
                    <td class="border">{{ $item->target_female }}</td>
                    <td class="border">{{ $item->target_totalsex }}</td>
                    <td class="border"></td>
                    <td class="border"></td>
                    <td class="border"></td>
                    <td class="border">{{ $item->pap_desc }}</td>
                    <td class="border">{{ $item->pap_code }}</td>
                    <td class="border">{{ $item->gad_activity }}</td>
                    <td class="border"></td>
                    <td class="border">{{ $item->budget_tierone }}</td>
                    <td class="border">{{ $item->budget_tiertwo }}</td>
                    <td class="border">{{ $item->budget_totalamount }}</td>
                    <td class="border"></td>
                    <td class="border"></td>
                    <td class="border"></td>
                    <td class="border">{{ $item->source }}</td>
                    <td class="border">{{ $item->rawresponsible_unit }}</td>
                    <td class="border">{{ $item->justification }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>