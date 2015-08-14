<?php


class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}    
// Page header
function Header()
{
    // Logo
    $this->Image('assets/images/logo.jpg',10,6,60);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
     // Move to the right
    $this->Cell(60);
    // Colors of frame, background and text
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(200,200,255);
    $this->SetTextColor(220,50,50);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell(65,15,'PRICE CALCULATION',1,1,'C',true);
    // Line break
    $this->Ln(10);
   
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}


/// Start Fungsi
//Format Hari 
function fh($tgl)
{
    setlocale (LC_TIME, 'INDONESIAN');
    $tgl = strtotime($tgl);
    $st = strftime( "%A", $tgl);
    return $st;
}
//Format Tanggal 
function ft($tgl)
{
    setlocale (LC_TIME, 'INDONESIAN');
    $tgl = strtotime($tgl);
    $st = strftime( "%d %B %Y", $tgl);
    return $st;
}
//Format Bulan
function ftm($tgl)
{
    setlocale (LC_TIME, 'INDONESIAN');
    $tgl = strtotime($tgl);
    $st = strftime( "%m", $tgl);
    return $st;
}
//Format Tahun
function fty($tgl)
{
    setlocale (LC_TIME, 'INDONESIAN');
    $tgl = strtotime($tgl);
    $st = strftime( "%y", $tgl);
    return $st;
}
///End Fungsi

///Awal Pembuatan Variable Yang Akan Ditampilkan
//Awal Data Ditampilkan
foreach($calculation->result() as $data)
{
//Awal Pembuatan Variable Yang Akan Ditampilkan
$tgl      = $data->calc_date;
$id       = $data->calc_id;
$cust     = $data->calc_cust;
$custcode = $data->calc_custcode;
$sagacode = $data->calc_sagacode;
$qty      = $data->calc_qty;
$exc      = $data->calc_exc;
$ng       = $data->calc_ng;
$profit   = $data->calc_profit;
$wire     = $data->calc_wire;
$supp     = $data->calc_supp;
$nw       = $data->calc_nw;
$gw       = $data->calc_gw;
$wprc     = $data->calc_wprc;
$wcurr    = $data->calc_wcurr;
$mc       = $data->calc_matcost;
$wsh1     = $data->calc_wsh1;
$wsh1w    = $data->calc_wsh1w;
$wsh1c    = $data->calc_wsh1c;
$wsh2     = $data->calc_wsh2;
$wsh2w    = $data->calc_wsh2w;
$wsh2c    = $data->calc_wsh2c;
$totwsh   = $data->calc_totwsh;
$mchead    = $data->calc_mchead;
$mcheadprc = $data->calc_mcheadprc;
$mcheaddcpm= $data->calc_mcheaddcpm;
$mcheadpppm= $data->calc_mcheadpppm;
$mcheaddcpp= $data->calc_mcheaddcpp;
$mcroll    = $data->calc_mcroll;
$mcrollprc = $data->calc_mcrollprc;
$mcrolldcpm= $data->calc_mcrolldcpm;
$mcrollpppm= $data->calc_mcrollpppm;
$mcrolldcpp= $data->calc_mcrolldcpp;
$mccutt    = $data->calc_mccutt;
$mccuttprc = $data->calc_mccuttprc;
$mccuttdcpm= $data->calc_mccuttdcpm;
$mccuttpppm= $data->calc_mccuttpppm;
$mccuttdcpp= $data->calc_mccuttdcpp;
$mctrimm    = $data->calc_mctrimm;
$mctrimmprc = $data->calc_mctrimmprc;
$mctrimmdcpm= $data->calc_mctrimmdcpm;
$mctrimmpppm= $data->calc_mctrimmpppm;
$mctrimmdcpp= $data->calc_mctrimmdcpp;
$mcslott    = $data->calc_mcslott;
$mcslottprc = $data->calc_mcslottprc;
$mcslottdcpm= $data->calc_mcslottdcpm;
$mcslottpppm= $data->calc_mcslottpppm;
$mcslottdcpp= $data->calc_mcslottdcpp;
$mcstraighten    = $data->calc_mcstraighten;
$mcstraightenprc = $data->calc_mcstraightenprc;
$mcstraightendcpm= $data->calc_mcstraightendcpm;
$mcstraightenpppm= $data->calc_mcstraightenpppm;
$mcstraightendcpp= $data->calc_mcstraightendcpp;
$mcstraighten    = $data->calc_mcstraighten;
$mcdeprcost      = $data->calc_totdeprcost;
$mchtc           = $data->calc_htc;
$mcrtc           = $data->calc_rtc;
$mcctc           = $data->calc_ctc;
$mcstc           = $data->calc_stc;
$mcttc           = $data->calc_ttc;
$tmctc           = $data->calc_tottoolcost;
$mchlc           = $data->calc_hlc;
$mcrlc           = $data->calc_rlc;
$mcclc           = $data->calc_clc;
$mcslc           = $data->calc_slc;
$mctlc           = $data->calc_tlc;
$mcstlc           = $data->calc_stlc;
$pro1             = $data->calc_pro1;
$pro1lc           = $data->calc_pro1lc;
$pro2             = $data->calc_pro2;
$pro2lc           = $data->calc_pro2lc;
$pro3             = $data->calc_pro3;
$pro3lc           = $data->calc_pro3lc;
$pro4             = $data->calc_pro4;
$pro4lc           = $data->calc_pro4lc;
$pro5             = $data->calc_pro5;
$pro5lc           = $data->calc_pro5lc;
$fqlc             = $data->calc_fqlc;
$pclc             = $data->calc_pclc;
$fu1             = $data->calc_fu1;
$fu2             = $data->calc_fu2;
$pl1             = $data->calc_pl1;
$pl2             = $data->calc_pl2;
$bkg             = $data->calc_bkg;
$cuci            = $data->calc_cuci;
$assy            = $data->calc_assy;
$coat            = $data->calc_coat;
$elc             = $data->calc_elc;
$fex             = $data->calc_fex;
$sumlc           = $data->calc_sumlc;
$sumsub           = $data->calc_sumsub;
$sumoth           = $data->calc_sumoth;
$totsum           = $data->calc_totsum;
$admprofit        = $data->calc_admprofit;
$prcHMP           = $data->calc_prcHMP;
//Akhir Pembuatan Variable Yang Akan Ditampilkan
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetMargins(20,12);
$pdf->AliasNbPages();
$pdf->AddPage();

//Tanggal
    // position
    $pdf->SetXY(175,25);
    // Arial italic 8
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','BI',8);
    $pdf->Cell(10,8,'Date: '.$tgl,0,0,'C');
    // Line break
    $pdf->Ln(4);

// Tabel Persetujuan
    // position
    $pdf->SetXY(150,33);
    // Arial italic 8
    $pdf->SetFont('Arial','BI',8);
    $pdf->Cell(20,6,"Prepared by",1,0,'C');
    $pdf->Cell(20,6,"Checked by",1,1,'C');
    // Signing
    $pdf->SetXY(150,39);
    $pdf->Cell(20,18,"",1,0,'C');
    $pdf->Cell(20,18,"",1,1,'C');
    $pdf->Image('assets/images/DA.jpg',155,40,10);
    $pdf->Image('assets/images/FL.jpg',175,40,10);
    //PIC
    $pdf->SetXY(150,57);
    $pdf->Cell(20,6,"Desi A.",1,0,'C');
    $pdf->Cell(20,6,"Flamellia",1,1,'C');
    // Line break
    $pdf->Ln(4);

// Tabel Utama    
$pdf->SetFont('Times','B',10);
    
$pdf->SetFillColor(170,170,255);
$pdf->Cell(40,5,"No. Id",1,0,'L',true);
$pdf->Cell(100,5,$id,1,1,'L',true);

$pdf->SetFillColor(220,220,255);
$pdf->Cell(40,5,"Customer",1,0,'L',true);
$pdf->Cell(100,5,$cust,1,1,'L',true);

$pdf->SetFillColor(170,170,255);
$pdf->Cell(40,5,"Customer Code",1,0,'L',true);
$pdf->Cell(100,5,$custcode,1,1,'L',true);

$pdf->SetFillColor(220,220,255);
$pdf->Cell(40,5,"Saga Code",1,0,'L',true);
$pdf->Cell(100,5,$sagacode,1,1,'L',true);

$pdf->SetFillColor(170,170,255);
$pdf->Cell(40,5,"Quantity/month",1,0,'L',true);
$pdf->Cell(100,5,$qty,1,1,'L',true);

$pdf->SetFillColor(220,220,255);
$pdf->Cell(40,5,"Exchange Rate",1,0,'L',true);
$pdf->Cell(100,5,$exc,1,1,'L',true);

$pdf->SetFillColor(170,170,255);
$pdf->Cell(40,5,"NG Ratio(%)",1,0,'L',true);
$pdf->Cell(100,5,$ng,1,1,'L',true);

$pdf->SetFillColor(220,220,255);
$pdf->Cell(40,5,"Adm & Profit ratio(%)",1,0,'L',true);
$pdf->Cell(100,5,$profit,1,1,'L',true);
$pdf->Ln(4);

// Tabel Material Cost
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,6,"Material Cost (Rp/pcs)",0,1,'L');
$pdf->SetFillColor(170,170,255);
$pdf->Cell(20,6,"Material",1,0,'C',true);
$pdf->Cell(20,6,"Supplier",1,0,'C',true);
$pdf->Cell(30,6,"Net Weight(gr)",1,0,'C',true);
$pdf->Cell(30,6,"Gross Weight(gr)",1,0,'C',true);
$pdf->Cell(20,6,"Price/kg",1,0,'C',true);
$pdf->Cell(20,6,"Currency)",1,0,'C',true);
$pdf->Cell(30,6,"Material Cost",1,1,'C',true);

$pdf->SetFont('Times','',10);
$pdf->Cell(20,6,$wire,1,0,'C');
$pdf->Cell(20,6,$supp,1,0,'C');
$pdf->Cell(30,6,$nw,1,0,'C');
$pdf->Cell(30,6,$gw,1,0,'C');
$pdf->Cell(20,6,$wprc,1,0,'C');
$pdf->Cell(20,6,$wcurr,1,0,'C');
$pdf->SetFillColor(50,245,150);
$pdf->Cell(30,6,$mc,1,1,'C',true);
$pdf->Ln(4);

// Tabel Purchased Parts Cost
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,6,"Purchased Parts Cost (Rp)",0,1,'L');
$pdf->SetFillColor(170,170,255);
$pdf->Cell(40,6,"Parts Name",1,0,'C',true);
$pdf->Cell(60,6,"Dimension",1,0,'C',true);
$pdf->Cell(40,6,"Weight(gr)",1,0,'C',true);
$pdf->Cell(30,6,"Cost",1,1,'C',true);

$pdf->SetFont('Times','',10);
$pdf->Cell(40,6,"WASHER",1,0,'C');
$pdf->Cell(60,6,$wsh1,1,0,'L');
$pdf->Cell(40,6,$wsh1w,1,0,'C');
$pdf->Cell(30,6,$wsh1c,1,1,'C');

$pdf->Cell(40,6,"WASHER",1,0,'C');
$pdf->Cell(60,6,$wsh2,1,0,'L');
$pdf->Cell(40,6,$wsh2w,1,0,'C');
$pdf->Cell(30,6,$wsh2c,1,1,'C');

$pdf->SetFont('Times','B',10);
$pdf->Cell(140,6,"Total Purchased Parts Cost",1,0,'C');
$pdf->SetFillColor(50,245,150);
$pdf->Cell(30,6,$totwsh,1,0,'C',true);
$pdf->Ln(8);

// Tabel Machine Depreciation Cost
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,6,"Machine Depreciation(8 Years) Cost (Rp/pcs)",0,1,'L');
$pdf->SetFillColor(170,170,255);
$pdf->Cell(20,6,"Process",1,0,'C',true);
$pdf->Cell(30,6,"Used Machine",1,0,'C',true);
$pdf->Cell(30,6,"Price (Rp)",1,0,'C',true);
$pdf->Cell(30,6,"Depr. Cost(Rp/mo)",1,0,'C',true);
$pdf->Cell(30,6,"Prod. Plan (pcs/mo)",1,0,'C',true);
$pdf->Cell(30,6,"Depr. Cost ",1,1,'C',true);

$pdf->SetFont('Times','',10);
$pdf->Cell(20,6,"Heading",1,0,'L');
$pdf->Cell(30,6,$mchead,1,0,'C');
$pdf->Cell(30,6,$mcheadprc,1,0,'C');
$pdf->Cell(30,6,$mcheaddcpm,1,0,'C');
$pdf->Cell(30,6,$mcheadpppm,1,0,'C');
$pdf->Cell(30,6,$mcheaddcpp,1,1,'C');

$pdf->Cell(20,6,"Rolling",1,0,'L');
$pdf->Cell(30,6,$mcroll,1,0,'C');
$pdf->Cell(30,6,$mcrollprc,1,0,'C');
$pdf->Cell(30,6,$mcrolldcpm,1,0,'C');
$pdf->Cell(30,6,$mcrollpppm,1,0,'C');
$pdf->Cell(30,6,$mcrolldcpp,1,1,'C');

$pdf->Cell(20,6,"Cutting",1,0,'L');
$pdf->Cell(30,6,$mccutt,1,0,'C');
$pdf->Cell(30,6,$mccuttprc,1,0,'C');
$pdf->Cell(30,6,$mccuttdcpm,1,0,'C');
$pdf->Cell(30,6,$mccuttpppm,1,0,'C');
$pdf->Cell(30,6,$mccuttdcpp,1,1,'C');

$pdf->Cell(20,6,"Slotting",1,0,'L');
$pdf->Cell(30,6,$mcslott,1,0,'C');
$pdf->Cell(30,6,$mcslottprc,1,0,'C');
$pdf->Cell(30,6,$mcslottdcpm,1,0,'C');
$pdf->Cell(30,6,$mcslottpppm,1,0,'C');
$pdf->Cell(30,6,$mcslottdcpp,1,1,'C');

$pdf->Cell(20,6,"Trimming",1,0,'L');
$pdf->Cell(30,6,$mctrimm,1,0,'C');
$pdf->Cell(30,6,$mctrimmprc,1,0,'C');
$pdf->Cell(30,6,$mctrimmdcpm,1,0,'C');
$pdf->Cell(30,6,$mctrimmpppm,1,0,'C');
$pdf->Cell(30,6,$mctrimmdcpp,1,1,'C');

$pdf->Cell(20,6,"Straightening",1,0,'L');
$pdf->Cell(30,6,$mcstraighten,1,0,'C');
$pdf->Cell(30,6,$mcstraightenprc,1,0,'C');
$pdf->Cell(30,6,$mcstraightendcpm,1,0,'C');
$pdf->Cell(30,6,$mcstraightenpppm,1,0,'C');
$pdf->Cell(30,6,$mcstraightendcpp,1,1,'C');

$pdf->SetFont('Times','B',10);
$pdf->Cell(140,6,"Total Machine Depreciation Cost",1,0,'C');
$pdf->SetFillColor(50,245,150);
$pdf->Cell(30,6,$mcdeprcost,1,0,'C',true);
$pdf->Ln(8);

// Tabel Tooling Cost
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,6,"Tooling Depreciation Cost(Rp/pcs)",0,1,'L');
$pdf->SetFillColor(170,170,255);
$pdf->Cell(50,6,"Process",1,0,'C',true);
$pdf->Cell(30,6,"Tooling Cost",1,1,'C',true);

$pdf->SetFont('Times','',10);
$pdf->Cell(50,6,"Heading",1,0,'L');
$pdf->Cell(30,6,$mchtc,1,1,'C');
$pdf->Cell(50,6,"Rolling",1,0,'L');
$pdf->Cell(30,6,$mcrtc,1,1,'C');
$pdf->Cell(50,6,"Cutting",1,0,'L');
$pdf->Cell(30,6,$mcctc,1,1,'C');
$pdf->Cell(50,6,"Slotting",1,0,'L');
$pdf->Cell(30,6,$mcstc,1,1,'C');
$pdf->Cell(50,6,"Trimming",1,0,'L');
$pdf->Cell(30,6,$mcttc,1,1,'C');

$pdf->SetFont('Times','B',10);
$pdf->Cell(50,6,"Total Tooling Depreciation Cost",1,0,'C');
$pdf->SetFillColor(50,245,150);
$pdf->Cell(30,6,$tmctc,1,0,'C',true);
$pdf->Ln(8);

// Tabel Processing Cost
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,6,"Processing Cost(Rp/pcs)",0,1,'L');
$pdf->SetFillColor(170,170,255);
$pdf->Cell(50,6,"Process",1,0,'C',true);
$pdf->Cell(40,6,"Labor Cost",1,0,'C',true);
$pdf->Cell(40,6,"Subcontractor",1,0,'C',true);
$pdf->Cell(40,6,"Others",1,1,'C',true);

$pdf->SetFont('Times','',10);
$pdf->Cell(50,6,"Heading",1,0,'L');
$pdf->Cell(40,6,$mchlc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Rolling",1,0,'L');
$pdf->Cell(40,6,$mcrlc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Cutting",1,0,'L');
$pdf->Cell(40,6,$mcclc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Slotting",1,0,'L');
$pdf->Cell(40,6,$mcslc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Trimming",1,0,'L');
$pdf->Cell(40,6,$mctlc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Straightening",1,0,'L');
$pdf->Cell(40,6,$mcstlc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"M. Process 1 -> ".$pro1,1,0,'L');
$pdf->Cell(40,6,$pro1lc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"M. Process 2 -> ".$pro2,1,0,'L');
$pdf->Cell(40,6,$pro2lc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"M. Process 3 -> ".$pro3,1,0,'L');
$pdf->Cell(40,6,$pro3lc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"M. Process 4 -> ".$pro4,1,0,'L');
$pdf->Cell(40,6,$pro4lc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"M. Process 5 -> ".$pro5,1,0,'L');
$pdf->Cell(40,6,$pro5lc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Final Quality",1,0,'L');
$pdf->Cell(40,6,$fqlc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Packing",1,0,'L');
$pdf->Cell(40,6,$pclc,1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Furnace(kg)",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$fu1,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Furnace(pcs)",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$fu2,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Plating(kg)",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$pl1,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Plating(pcs)",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$pl2,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Baking",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$bkg,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Cuci",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$cuci,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Assembling",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$assy,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Coating",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$coat,1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(50,6,"Electricity",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$elc,1,1,'C');

$pdf->Cell(50,6,"Factory Expense",1,0,'L');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$fex,1,1,'C');

$pdf->SetFont('Times','B',10);
$pdf->Cell(50,6,"Total Cost",1,0,'C');
$pdf->Cell(40,6,$sumlc,1,0,'C');
$pdf->Cell(40,6,$sumsub,1,0,'C');
$pdf->Cell(40,6,$sumoth,1,1,'C');

$pdf->SetFont('Times','B',10);
$pdf->Cell(130,6,"Total Processing Cost",1,0,'C');
$pdf->SetFillColor(50,245,150);
$pdf->Cell(40,6,$totsum,1,0,'C',true);
$pdf->Ln(12);

// Tabel Summary
$pdf->SetFont('Times','B',10);
$pdf->Cell(20,6,"Cost Summary(Rp/pcs)",0,1,'L');
$pdf->Cell(50,6,"Item",1,0,'C');
$pdf->Cell(40,6,"Formula",1,0,'C');
$pdf->Cell(40,6,"Cost",1,1,'C');

$pdf->Cell(5,6,"1)",1,0,'C');
$pdf->SetFillColor(100,225,250);
$pdf->Cell(45,6,"Material Cost",1,0,'L',true);
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$mc,1,1,'C');

$pdf->Cell(5,6,"2)",1,0,'C');
$pdf->SetFillColor(50,125,250);
$pdf->Cell(45,6,"Purchasing Cost",1,0,'L',true);
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$totwsh,1,1,'C');

$pdf->Cell(5,6,"3)",1,0,'C');
$pdf->SetFillColor(250,125,30);
$pdf->Cell(45,6,"Processing Cost",1,0,'L',true);
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(5,6,"4)",1,0,'C');
$pdf->Cell(45,6,"Manufacturing Cost",1,0,'L');
$pdf->Cell(40,6,"1)+2)+3)",1,0,'C');
$pdf->Cell(40,6,"",1,1,'C');

$pdf->Cell(5,6,"5)",1,0,'C');
$pdf->SetFillColor(250,125,130);
$pdf->Cell(45,6,"Depr. Cost Tooling",1,0,'L',true);
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$tmctc,1,1,'C');

$pdf->Cell(5,6,"6)",1,0,'C');
$pdf->SetFillColor(150,225,70);
$pdf->Cell(45,6,"Depr. Cost Machine",1,0,'L',true);
$pdf->Cell(40,6,"",1,0,'C');
$pdf->Cell(40,6,$mcdeprcost,1,1,'C');

$pdf->Cell(5,6,"7)",1,0,'C');
$pdf->Cell(45,6,"Adm. & Profit",1,0,'L');
$pdf->Cell(40,6,"4)+5)x ".$profit."%",1,0,'C');
$pdf->Cell(40,6,$admprofit,1,1,'C');

$pdf->Cell(5,6,"8)",1,0,'C');
$pdf->SetFillColor(50,245,150);
$pdf->Cell(45,6,"Price HMP",1,0,'L',true);
$pdf->Cell(40,6,"4)+5)+6)+7) ",1,0,'C');
$pdf->Cell(40,6,$prcHMP,1,1,'C',true);

//Print
$pdf->Output();
?>