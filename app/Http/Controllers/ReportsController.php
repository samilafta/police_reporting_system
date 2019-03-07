<?php

namespace App\Http\Controllers;

use App\CaseDetail;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Jimmyjs\ReportGenerator\Facades\CSVReportFacade;
use Jimmyjs\ReportGenerator\Facades\ExcelReportFacade;
use Jimmyjs\ReportGenerator\Facades\PdfReportFacade;
use Barryvdh\DomPDF\Facade as PDF;


class ReportsController extends Controller
{


    public function index() {

        return view('reports.index');

    }

    public function general($id) {

        if($id == 1){

            // today's report
            $cases = CaseDetail::whereDate('created_at', Carbon::today())->get();
            $type = "Today's Report";

        }

        elseif ($id == 2) {

            // yesterday's report
            $cases = CaseDetail::whereDate('created_at', Carbon::yesterday())->get();
            $type = "Yesterday's Report";

        }

        elseif ($id == 3){

            // last week report
            $agoDate = Carbon::today()->subWeek();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate))->get();
            $type = "Last Week's Report";

        }
        elseif($id == 4) {

            // monthly report
            $agoDate = Carbon::today()->subMonth();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate))->get();
            $type = "Last Month's Report";

        }

        elseif($id == 5) {

            // yearly report
            $agoDate = Carbon::today()->subYear();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate))->get();
            $type = "Last Year's Report";

        }

        return view('reports.general', compact('cases', 'type', 'id'));

    }

    public function excelReport($id) {

        $title="";
        $cases ="";
        $meta ="";

        if($id == 1){

            // today's report
            $cases = CaseDetail::whereDate('created_at', Carbon::today());
            $title = "Today's Report";
            $meta = [ // For displaying filters description on header
                'Date' => Carbon::today()->toFormattedDateString(),
            ];

        }

        elseif ($id == 2) {

            // yesterday's report
            $cases = CaseDetail::whereDate('created_at', Carbon::yesterday());
            $title = "Yesterday's Report";
            $meta = [ // For displaying filters description on header
                'Date' => Carbon::yesterday()->toFormattedDateString(),
            ];

        }

        elseif ($id == 3){

            // last week report
            $agoDate = Carbon::today()->subWeek();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate));
            $title = "Last Week's Report";
            $meta = [ // For displaying filters description on header
                'Date' => 'From ' .$agoDate->toFormattedDateString() . ' To ' . $nowDate->toFormattedDateString(),
            ];

        }

        elseif($id == 4) {

            // monthly report
            $agoDate = Carbon::today()->subMonth();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate));
            $title = "Last Month's Report";
            $meta = [ // For displaying filters description on header
                'Date' => 'From ' .$agoDate->toFormattedDateString() . ' To ' . $nowDate->toFormattedDateString(),
            ];

        }

        elseif($id == 5) {

            // yearly report
            $agoDate = Carbon::today()->subYear();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate));
            $title = "Last Year's Report";
            $meta = [ // For displaying filters description on header
                'Date' => 'From ' .$agoDate->toFormattedDateString() . ' To ' . $nowDate->toFormattedDateString(),
            ];

        }

        $columns = [ // Set Column to be displayed
            'Case Number' => 'case_number',
            'Complainant Name' => function($case) {
                    return $case->complainant->c_full_name;
                },
            'Filed By' => function($case) {
                return $case->user->profile->full_name;
                },
            'Investigator' => function($case) {
                    if($case->investigator_id == null)
                        return "not assigned";
                    else
                    return $case->assigned_user->profile->full_name;
                },
            'Status' => function($case) {
                if($case->case_status == 0)
                    return "case opened";
                if($case->case_status == 1)
                    return "under investigation";
                if($case->case_status == 2)
                    return "case closed";
            },
            'Created At' => 'created_at',
        ];

        $this->excelExport($title, $meta, $cases, $columns);

    }

    public function pdfReport($id) {

        $title="";
        $cases ="";
        $meta ="";

        if($id == 1){

            // today's report
            $cases = CaseDetail::whereDate('created_at', Carbon::today());
            $title = "Today's Report";
            $meta = [ // For displaying filters description on header
                'Date' => Carbon::today()->toFormattedDateString(),
            ];

        }

        elseif ($id == 2) {

            // yesterday's report
            $cases = CaseDetail::whereDate('created_at', Carbon::yesterday());
            $title = "Yesterday's Report";
            $meta = [ // For displaying filters description on header
                'Date' => Carbon::yesterday()->toFormattedDateString(),
            ];

        }

        elseif ($id == 3){

            // last week report
            $agoDate = Carbon::today()->subWeek();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate));
            $title = "Last Week's Report";
            $meta = [ // For displaying filters description on header
                'Date' => 'From ' .$agoDate->toFormattedDateString() . ' To ' . $nowDate->toFormattedDateString(),
            ];


        }

        elseif($id == 4) {

            // monthly report
            $agoDate = Carbon::today()->subMonth();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate));
            $title = "Last Month's Report";
            $meta = [ // For displaying filters description on header
                'Date' => 'From ' .$agoDate->toFormattedDateString() . ' To ' . $nowDate->toFormattedDateString(),
            ];

        }

        elseif($id == 5) {

            // yearly report
            $agoDate = Carbon::today()->subYear();
            $nowDate = Carbon::now();

            $cases = CaseDetail::whereBetween('created_at', array($agoDate, $nowDate));
            $title = "Last Year's Report";
            $meta = [ // For displaying filters description on header
                'Date' => 'From ' .$agoDate->toFormattedDateString() . ' To ' . $nowDate->toFormattedDateString(),
            ];


        }

        $columns = [ // Set Column to be displayed
            'Case Number' => 'case_number',
            'Complainant Name' => function($case) {
                return $case->complainant->c_full_name;
            },
            'Filed By' => function($case) {
                return $case->user->profile->full_name;
            },
            'Investigator' => function($case) {
                if($case->investigator_id == null)
                    return "not assigned";
                else
                    return $case->assigned_user->profile->full_name;
            },
            'Status' => function($case) {
                if($case->case_status == 0)
                    return "case opened";
                if($case->case_status == 1)
                    return "under investigation";
                if($case->case_status == 2)
                    return "case closed";
            },
            'Created At' => 'created_at',
        ];

//        dd($columns);
        $this->pdfExport($title, $meta, $cases, $columns);

    }

    private function excelExport($title, $meta, $queryBuilder, $columns) {

        return ExcelReportFacade::of($title, $meta, $queryBuilder, $columns)
            ->limit(50) // Limit record to be showed
            ->download('general_report'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()

    }

    private function csvExport($title, $meta, $queryBuilder, $columns) {

        return CsvReportFacade::of($title, $meta, $queryBuilder, $columns)
            ->limit(50) // Limit record to be showed
            ->download('general_report'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()

    }

    private function pdfExport($title, $meta, $queryBuilder, $columns) {

        return PdfReportFacade::of($title, $meta, $queryBuilder, $columns)
            ->limit(50) // Limit record to be showed
            ->download('general_report'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()

    }




    public function custom(Request $request) {

        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $cases = CaseDetail::whereBetween('created_at', array($from_date, $to_date))->get();

        return view('reports.custom', compact('cases', 'from_date', 'to_date'));

    }

    public function excelCustom($from_date, $to_date) {

        $cases = CaseDetail::whereBetween('created_at', array($from_date, $to_date))->get();
        $title = "Custom Report";
        $meta = [ // For displaying filters description on header
            'Date' => 'From ' .$from_date. ' To ' . $to_date,
        ];

        $columns = [ // Set Column to be displayed
            'Case Number' => 'case_number',
            'Complainant Name' => function($case) {
                return $case->complainant->c_full_name;
            },
            'Filed By' => function($case) {
                return $case->user->profile->full_name;
            },
            'Investigator' => function($case) {
                if($case->investigator_id == null)
                    return "not assigned";
                else
                    return $case->assigned_user->profile->full_name;
            },
            'Status' => function($case) {
                if($case->case_status == 0)
                    return "case opened";
                if($case->case_status == 1)
                    return "under investigation";
                if($case->case_status == 2)
                    return "case closed";
            },
            'Created At' => 'created_at',
        ];

        $this->excelExport($title, $meta, $cases, $columns);

    }


}
