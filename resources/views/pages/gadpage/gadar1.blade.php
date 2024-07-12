<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>C.E. GL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
  <style>
    @page{
      size: legal landscape;

    }

  </style>
</head>
<body class="legal landscape">
     
  <section class="sheet page">
    <div class="container-fluid">       
      <!-- <table class="title table table-bordered" style="margin-top: 17px;margin-bottom: 0px;border-color: white;">
        <thead style="line-height:15px;">
          <th>
            <img src="DSWD_LOGO.png" style="margin-top: 0px;" class="mx-auto d-block float-start" width="250px" height="75px">
          </th>
          <th style="font-family: Times, Times New Roman, serif;text-align: center;float: right;">
            <label style="font-size: 15px;">CRISIS INTERVENTION SECTION</label><br>
            <label style="font-size: 12px;">PROTECTIVE SERVICES DIVISION</label><br>
            <label style="font-size: 15px;">FIELD OFFICE CARAGA</label><br>
            <label style="font-size: 10px;">DSWD-PMB-GF-000 | REV 00 / xx xxx xxxx</label>
          </th>        
        </thead>          
      </table> -->
      <table class="title table table-bordered" style="margin-top: 0px;margin-bottom: 0px;border-color: white;">
        <thead style="line-height: 30px; ">
            <td colspan="2" style="text-align: center;font-family: Arial, sans-serif">
              <label style="font-size: 19px;font-weight: bold;">Department of Social Welfare and Development</label><br>
              <label style="font-size: 15px;">OFFICE PERFORMANCE CONTRACT</label><br>
              <label style="font-size: 15px;">FY 2023</label><br>
              <label style="font-size: 15px;">FIELD OFFICE CARAGA</label>
            </td>
        </thead>  
      </table>      

      <table class="table table-bordered table-xs" style="border-color: black;margin-bottom: 0px; margin-top: 0px;">                
          <thead>
              <tr style="font-size:13px; font-weight: bold; text-align: center;">
                  <th colspan="2" class="col-sm-3 p-0">KEY RESULTS AREA</th>
                  <th rowspan="2" class="col-sm-4">PERFORMANCE INDICATOR </br>(Quantity, Quality, Timeliness)</th>
                  <th rowspan="2" scope="col" class="col-sm-1 p-0">ALLOTTED BUDGET</br>(in Php)</th>
                  <th rowspan="2" scope="col" class="col-sm-2 p-0">ACCOUNTABILITY CENTER </br> (Division, Units, Individuals)</th>
              </tr>
              <tr style="font-size:13px; font-weight: bold; text-align: center;"> 
                  <th class="p-0">Objectives, Program, Project, Activity</th>
                  <th class="p-0"> Weight Allocation</th> 
              </tr>
          </thead>
          <tbody>
          <tr style="font-size:13px; font-weight: bold; text-align: center; background-color: rgb(128, 128, 128)" >
              <td colspan="1" class="p-0">STRATEGIC PRIORITIES</td>
              <td colspan="1" class="p-0">50%</td>
              <td colspan="8" class="p-0"></td>
          </tr>

          <!-- <tbody id="strategic2"> -->
              @foreach ($data as $d)
                  @if ($d->indicator_id == 1)
                      <tr>
                          <td class="p-0" >
                              <div class="text-center m-1">{{ $d->name }}</div>
                          </td>
                          <td class="p-0" >
                              <div class="row p-0 m-1">
                                      <div class="text-center">{{ $d->sub_weight_allocation }}</div>
                              </div>
                          </td>
                          <td class="p-0"><div class="row">
                              <div class="col-1 text-center p-0 m-1">{{ $d->sort }}</div>
                              <div class="col-10 p-0">
                                  <div class="m-1"><strong>{{ $d->target_indicator_desc}}</strong></div>
                                  <div class="m-1"><strong>Ql:</strong> {{ $d->quantity }}</div>
                                  <div class="m-1"><strong>Qn:</strong> {{ $d->quality }}</div>
                                  <div class="m-1"><strong>T:</strong> {{ $d->timeliness }}</div>
                              </div>
                          </div></td>
                          <td class="p-0">
                              <div class="row m-1 p-0">
                                      <div class="text-center"> {{ $d->alloted_budget }}</div>
                              </div>
                          </td>
                          <td class="p-0"><div class="row m-1">
                                  <div class="text-center">{{ $d->accountability_center }}</div>
                          </div></td>
                          <!-- <td  scope="col" class="col-sm p-0" align="center">
                              <button class="btn btn-success btn-sm" type="button" data-bs-original-title="Update" data-bs-toggle="modal" data-bs-target="#createPCModal"><span class="icon-save-alt"></span></button>
                          </td> -->
                      </tr>
                  @endif
              @endforeach
                                                   
          <!-- </tbody> -->

          <tr style="font-size:13px; font-weight: bold; text-align: center; background-color: rgb(128, 128, 128)">
              <td colspan="1" class="p-0">CORE FUNCTIONS</td>
              <td colspan="1" class="p-0" >35%</td>
              <td colspan="8" class="p-0" ></td>                       
          </tr>
          <tr style="font-size:13px; font-weight: bold; text-align: center; background-color: rgb(128, 128, 128)">
              <td colspan="1" class="p-0">SUPPORT FUNCTIONS</td>
              <td colspan="1" class="p-0">15%</td>
              <td colspan="8" class="p-0"></td>    
          </tr>
          <tr style="font-size:13px; font-weight: bold; text-align: center;">
               <td colspan="1" ></td>
              <td colspan="1" class="p-0">100%</td>
              <td colspan="10" ></td>    
          </tr>
          <tr style="font-size:13px; font-weight: normal; text-align: center;">
          <!-- <td colspan=""></td> -->
            <td colspan="12" width="90px;" style="text-align:left;" class="p-0">
              <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp I,</label> 
              <label style="font-weight:bold;">MARI-FLOR A. DOLLAGA-LIBANG</label>
              <label>, Head of the</label> <label style="font-weight:bold;">Field Office Caraga</label> commit to deliver and agree to be rated on the attainment of these targets in accordance with the indicated criteria for the period of January to December 2023.	</label>
            </td>
          </tr>
          </tbody>
    </table>































      <!-- <table class="title2 table table-bordered" style="border-color: white;margin-bottom: 0px;">
        <tr style="font-size:10px;font-weight: bold;">
          <td>
          </td>
          <td colspan="2">
          </td>
          <td >
          </td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td ></td>
          <td></td>
          <td>
          </td>
          <td colspan="4"></td>
          <td style="border-right:1px solid black;">
            <label>GL No.</label>
          </td>
          <td colspan="3" style="border: 1px solid black;"></td>
        </tr>
        <tr style="font-size:10px;font-weight: bold;">
          <td style="border-right:1px solid black;">
            <label>QN:</label>
          </td>
          <td colspan="2" style="border: 1px solid black;">
            <label>&nbsp;</label>
          </td>
          <td style="border-right:1px solid black;">
            <label>PCN:</label>
          </td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td style="border-right:1px solid black;border: 1px solid black;"></td>
          <td></td>
          <td>
          </td>
          <td colspan="4"></td>
          <td style="border-right:1px solid black;">
            <label>Date:</label>
          </td>
          <td style="border: 1px solid black;"></td>
          <td style="border: 1px solid black;"></td>
          <td style="border: 1px solid black;"></td>
        </tr>
      </table> -->


      <!-- <table class="category table table-bordered" style="border-color:white;margin-top: 0px;font-size: 10px;font-weight: bold;">
         <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <span> <input type="checkbox" name=""> New</span>&nbsp;&nbsp;&nbsp;
            <span> <input type="checkbox" name=""> Returning</span>
          </td>
          <td></td>
          <td></td>
          <td>
            <span> <input type="radio" name=""> Onsite</span>&nbsp;&nbsp;&nbsp;
            <span> <input type="checkbox" name=""> Walk-in</span>           
           </td>
          <td>
            <span> <input type="checkbox" name=""> Referral</span>&nbsp;&nbsp;&nbsp;
            <span> <input type="radio" name=""> Off-site</span>
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table> -->

      <!---Body --->
      
      <!-- <div style="font-family: Arial, sans-serif">
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;margin-top:-10px;border-top-color: black;border-color: white;"> -->
          <!---Sentence 1 --->
          <!-- <tr style="text-align:center;">
            <td colspan="3" style="text-align:left;">
              <label>This is to certify that,</label>
            </td>
            <td colspan="5" style="border-bottom: 1px solid black;font-weight: bold;">
              <label>Kim Jay Esparagoza Aro</label>
            </td>
            <td colspan="3">
              <span> <input type="checkbox" name=""> Male</span>&nbsp;&nbsp;&nbsp;
              <span> <input type="checkbox" name=""> Female</span>
            </td>
            <td style="border-bottom: 1px solid black;font-weight: bold;">
              <label>24</label>
            </td>     
          </tr>
          <tr style="text-align:center;font-size:10px;">
            <td colspan="3">
              
            </td>
            <td colspan="5">
              <label style="font-weight: bold;">Kumpletong Pangalan <label style="font-size:8px;font-weight: normal;">(First name, Middle name, Last name)</label></label>
            </td>
            <td colspan="3">
              <label style="font-weight: bold;">Kasarian <label style="font-size:8px;font-weight: normal;">(Sex)</label></label>
            </td>
            <td>
              <label style="font-weight: bold;">Edad <label style="font-size:8px;font-weight: normal;">(Age)</label></label>
            </td>
          </tr> -->
          <!---End of Sentence 1 --->
          <!---Sentence 2 --->
          <!-- <tr style="text-align:center;">
            <td colspan="3" style="text-align:left;">
              <label>and presently residing at </label>
            </td>
            <td colspan="9" style="border-bottom: 1px solid black;">
              <label style="font-weight:bold;">192 10th Street Guingona Subdivision, Butuan City, Agusan Del Norte</label>
            </td>
          </tr>
          <tr style="text-align:center;">
            <td colspan="3">
              
            </td>
            <td colspan="9">
              <label style="font-weight: bold;">Kumpletong Tirahan <label style="font-size:8px;font-weight: normal;">(Complete Address)</label></label>
            </td>
          </tr> -->
          <!---End of Sentence 2 --->
          <!---Sentence 3 --->
          <!-- <tr>
            <td colspan="12" style="text-align:left;">
              <label>has been found eligble for assistance after assessment and validation conducted, for his/herself or through the representation of his/her.</label>
            </td>
          </tr> -->
          <!---End of Sentence 3 --->
          <!---Sentence 4 --->
        <!-- </table>
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;margin-top: -10px;border-top-color: black;border-color: white;">
          <tr style="text-align:center;">
            <td colspan="3" style="border-bottom: 1px solid black;">
              <label style="font-weight: bold;">Brother</label>
            </td>
            <td></td>
            <td colspan="8" style="border-bottom: 1px solid black;">
              <label style="font-weight: bold;">Allen Efren Otaza Hilado</label>
            </td>
          </tr>
          <tr style="text-align:center;font-size:10px;">
            <td colspan="3">
              <label style="font-weight: bold;">Relasyon ng Kinatawan sa Benepisyaryo <label style="font-size:8px;font-weight: normal;">(Relationship of the Representative to Beneficiary)</label></label>
            </td>
            <td></td>
            <td colspan="8">
              <label style="font-weight: bold;">Buong Pangalan ng Benepisyaryo <label style="font-size:8px;font-weight: normal;">(Name of Beneficiary)</label></label>
            </td>
          </tr>
        </table> -->
        <!---End of Sentence 4 --->
        <!---Table 1 --->
        <!-- <div style="background-color: #ECE8DD;color: black;margin-top: -16px;text-align: center;font-size: 14px;font-weight: bold;border: 1px solid black;">
          <label>Records of the case such as the following are confidentially filed at the Crisis Intervention Division (CID)</label>
        </div>
        <div style="font-family: DejaVu Sans Mono">
          <table class="assessment table table-bordered" style="margin-top:2.5px;border-top: 1px solid black;line-height: 10px;">
            <tr style="font-size: 11px;, monospace;font-weight: bold;border: white;">
              <td width="170px;" style="border-left:1px solid black;border-bottom: 1px solid black;">
                  <input type="checkbox" name="sector"> General Intake Sheet <br>
                  <input type="checkbox" name="sector"> Valid I.D. Presented <br><br>
                  <label>_______________________</label><br><br>
                  <input type="checkbox" name="sector"> 4PS DSWD I.D. <br>
                  <input type="checkbox" name="sector"> Justification <br>
                
              </td>
              <td width="250px;" style="border-bottom: 1px solid black;">
                  <input type="checkbox" name="sector"> Medical Certificate/Abstract <br>
                  <input type="checkbox" name="sector"> Prescriptions <br>
                  <input type="checkbox" name="sector"> Statement of Account <br>
                  <input type="checkbox" name="sector"> Treatment Protocol <br>
                  <input type="checkbox" name="sector"> Quotation <br>
                </span>
              </td>
              <td style="border-bottom: 1px solid black;">
                  <input type="checkbox" name="sector"> Discharge Summary <br>
                  <input type="checkbox" name="sector"> Laboratory <br>
                  <input type="checkbox" name="sector"> Charge Slip <br>
                  <input type="checkbox" name="sector"> Funeral Contract <br>
                  <input type="checkbox" name="sector"> Death Certificate <br>
              </td>
              <td style="border-bottom: 1px solid black;border-right: 1px solid black;">
                  <input type="checkbox" name="sector"> Death Summary <br>
                  <input type="checkbox" name="sector"> Referral Letter <br>
                  <input type="checkbox" name="sector"> Social Case Study Report <br>
                  <input type="checkbox" name="sector"> Others<br><br>
                  <label>_______________________</label>
              </td>
            </tr>
          </table>
        </div> -->
        <!---End of Table 1 --->
        <!---Sentence 5 --->        
        <!-- <table class="beneficiary-info table table-bordered" style="font-size: 12px;margin-top:-10px;border-top-color: black;border-color: black;">          
          <tr style="text-align:center;">
            <td colspan="3" width="180px;" style="text-align:left;">
              <label>I,</label> 
              <label style="font-weight:bold;">MARI-FLOR A. DOLLAGA-LIBANG</label>
              <label>, Head of the</label> <label style="font-weight:bold;">Field Office Caraga</label> commit to deliver and agree to be rated on the attainment of these targets in accordance with the indicated criteria for the period of January to December 2023.	</label>
            </td> -->
            <!-- <td colspan="3" width="100px;" style="border-bottom: 1px solid black;font-weight: bold;">
              <label>₱ 5,000</label>
            </td>
            <td colspan="3" width="75px;">
              <label>assistance for</label>
            </td>
            <td colspan="3" width="100px;" style="border-bottom: 1px solid black;font-weight: bold;">
              <label>Allen Hilado</label>
            </td>      -->
          <!-- </tr>                   
        </table> -->
        <!---End of Sentence 5 --->
        <!---Sentence 6 ---> 
        <!-- <table class="beneficiary-info table table-bordered" style="font-size: 12px;margin-top:-10px;border-top-color: black;border-color: white;text-align: center;">          
          <tr>
            <td width="110px;" style="text-align:left;">
              <label>in the amount of </label>
            </td>
            <td colspan="2" width="130px" style="border-bottom: 1px solid black;font-weight: bold;">
              <label>Five Thousand Pesos</label>
            </td>
            <td colspan="2" width="5px">
              <label>Php.</label>
            </td>
            <td colspan="2" width="50px" style="border-bottom: 1px solid black;font-weight: bold;">
              <label></label>
            </td>  
            <td colspan="2" >
              
            </td>
            <td colspan="2" >
              
            </td>
          </tr>          
        </table>
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;border-top-color: black;border-color: white;text-align: center;">          
          <tr>
            <td width="125px;" style="text-align:left;">
              <label>Chargeable against </label>
            </td>
            <td width="500px" style="border-bottom: 1px solid black;font-weight: bold;">
              
            </td>
            <td></td>
          </tr>
        </table>
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;border-top-color: black;border-color: white;text-align: center;">          
          <tr>
            <td width="125px;" style="text-align:left;">
              <label>Cliente Category: </label>
            </td>
            <td width="500px" style="border-bottom: 1px solid black;font-weight: bold;">
              
            </td>
            <td></td>
          </tr>
        </table>
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;border-top-color: black;border-color: white;text-align: center;">          
          <tr>
            <td width="125px;" style="text-align:left;">
              <label>Payable to: </label>
            </td>
            <td width="500px" style="border-bottom: 1px solid black;font-weight: bold;">
              
            </td>
            <td></td>
          </tr>
        </table>
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;border-top-color: black;border-color: white;text-align: center;">          
          <tr>
            <td width="125px;" style="text-align:left;">
              <label>Mode of Admission: </label>
            </td>
            <td width="500px" style="border-bottom: 1px solid black;font-weight: bold;">
              
            </td>
            <td></td>
          </tr>
        </table> -->
        <!---End of Sentence 6 --->
        <!---Sentence 7 ---> 
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;margin-top:0px;;border-top-color: black;border-color: white;text-align: center;">
          <tr style="font-weight:bold;">
            <td colspan="4">
              <label>Conforme: </label>
            </td>
            <td colspan="4">
              
            </td>
            <td colspan="4">
              <label>Prepared by: </label>
            </td>
          </tr>
          <tr>
            <td colspan="4">              
            </td>
            <td colspan="4">              
            </td>
            <td colspan="4">              
            </td>
          </tr>
          <tr style="font-size: 13px;font-weight: bold;">
            <td></td>
            <td colspan="3" width="100px" style="border-bottom:1px solid black;">
              <label>MARI-FLOR A. DOLLAGA-LIBANG</label>
            </td>
            <td></td>
            <td colspan="3" width="130px">
              
            </td>
            <td></td>
            <td colspan="2" width="130px" style="border-bottom:1px solid black;">
              <label>MARIA SALOME P. NAVARRO</label>
            </td>
            <td></td>
          </tr>
          <tr style="font-size: 13px;">
            <td></td>
            <td colspan="3" width="100px">
              <label>Regional Director</label><br>
              <!-- <label style="font-size: 9px;color:#495579;">(Signature over Printed Name)</label> -->
            </td>
            <td></td>
            <td colspan="3" width="100px">

            </td>
            <td></td>
            <td colspan="2" width="100px">
              <label>Undersecretary, Social Welfare and Development</label><br>
              <!-- <label style="font-size: 9px;color:#495579;">(Signature over Printed Name)</label>               -->
            </td>
            <td></td>
          </tr>
          <tr style="font-weight:bold;">
            <td colspan="4">
              
            </td>
            <td colspan="4">
              <label>Approved by: </label>
            </td>
            <td colspan="4">
              
            </td>
          </tr>
          <tr>
            <td colspan="4">              
            </td>
            <td colspan="4">              
            </td>
            <td colspan="4">              
            </td>
          </tr>
          <tr style="font-size: 13px;font-weight: bold;">
            <td></td>
            <td colspan="3" width="100px" >
              
            </td>
            <td></td>
            <td colspan="3" width="130px" style="border-bottom:1px solid black;">
              <label>EDUARDO M. PUNAY</label>
            </td>
            <td></td>
            <td colspan="2" width="130px" >

            </td>
            <td></td>
          </tr>
          <tr style="font-size: 14px;">
            <td></td>
            <td colspan="3" width="100px">

            </td>
            <td></td>
            <td colspan="3" width="100px">
              <label>Officer-In-Charge, DSWD</label><br>
              <!-- <label style="font-size: 9px;color:#495579;">(Signature over Printed Name)</label> -->
            </td>
            <td></td>
            <td colspan="2" width="100px">

            </td>
            <td></td>
          </tr>
        </table>
        <!---End of Sentence 7--->
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;margin-top:-10px;border-top-color: black;border-color: white;text-align: center;">
          <tr style="font-size: 8px;border-bottom: 1px solid black;">
            <td colspan="4"></td>
            <td colspan="4">
              <label>Page 1 of 1</label>
            </td>
            <td colspan="4">
            </td>
          </tr>          
        </table>
        <table class="beneficiary-info table table-bordered" style="font-size: 12px;margin-top:-25px;border-top-color: black;border-color: white;text-align: center;">
          <tr style="font-size: 8px;font-weight: bold;">
            <td colspan="4"></td>
            <td  colspan="4">
              <img height="40px" style="float:right;" src="socotec.png">
              <label>DSWD Central Office, IBP Road, Batasan Pambansa Complex, Constitution Hills, Quezon City, Philippines 112  </label><br><label>Website: http://www.dswd.gov.ph  Email: ciu.co@dswd.gov.ph   Tel Nos.: 8962-2813 or 8931-8100 local 509,510  Telefax: (632) 931-8191</label>

            </td>
          </tr>
        </table>

      <!-- </div> -->
    </div>
  </section>

</body>
</html>