<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Receipt #: {{ $orderDetails->id }}</title>
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

          <link rel="stylesheet" href="{{ $style }}" type="text/css" />

    <style type="text/css" media="all">
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}
.divider_line{
  float: left;
    width: 100%;
    border-bottom: 1px solid #f3f3f3;
}
a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm; 
  margin: auto; 
  font-size: 14px;
  font-family: 'Roboto', sans-serif;
  font-weight: normal;
  font-family: 'Roboto';
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}


table {
    max-width: 100%;
    background-color: transparent;
    width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}
th {
    text-align: left;
  font-size: 16px;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td {
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
  color: #403e3d;
  font-size:12px;
}

.table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
  color: #403e3d;
  font-size:12px;
}

.table > thead > tr > th {
    vertical-align: bottom;
    /*border-bottom: 5px solid #006699;*/
  padding: 10px;
  color: #fff;
  background: #343844;
}

.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {
    border-top: 0
}

.table > tbody + tbody {
    border-top: 2px solid #ddd;
}

.table .table {
    background-color: #fff
}
.table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9
}

.table-hover > tbody > tr:hover > td, .table-hover > tbody > tr:hover > th {
    background-color: #f5f5f5
}

table col[class*=col-] {
    position: static;
    float: none;
    display: table-column
}

table td[class*=col-], table th[class*=col-] {
    position: static;
    float: none;
    display: table-cell
}
.table tfoot {
  font-weight: bold;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}
    </style>
  </head>
  <body>
    <?php $total_price = 0; 
  $discount_price = 0.00;
  ?>
  <div align="center">
  
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
          <table width="800" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="300" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td>

                    <img src="{{ $base64 }}" alt="Webqom Technologies" /></td>
                </tr>
                <tr>
                  <td></td>
                </tr></table>
              </td>
              <td valign="top">
                <table width="300" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td valign="top"><h1 class="green caps" style="margin-bottom:0;text-align:center" align="center"><b>{{$orderDetails->status}}</b></h1>
                      <div align="center">@if($orderDetails->payment_method)
                                  {{$orderDetails->payment_method->name}}
                                @else
                                  {{"Not Specific"}}
                                @endif 
                                (
                                  <?php echo date("jS M Y H:i", strtotime($orderDetails->created_at)); ?> 
                                )
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
  
  <tr>
    <td><div class="divider_line"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:100%"><div style="float:left;width:50%">
          <h5><b>Receipt #: {{ $orderDetails->id }}
            <br/>
            Invoice #: MY-{{ $orderDetails->transaction_id }}</b></h5>
        </div>
        <div style="float:right;width:50%;text-align:right">
          <h5><b>Client ID: {{ $orderDetails->user->user_client_id}}</b></h5>
        </div>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="120"><div align="left">Invoice Date</div></td>
        <td width="10"></td>
        <td><div align="left">: {{ date("jS M Y", strtotime($orderDetails->created_at))}}</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="alileft"><h5 class="caps"><b>Invoice To</b></h5></td>
      </tr>
      <tr>
        <td class="alileft">{{ $orderDetails->user->client->first_name }} {{ $orderDetails->user->client->last_name }}</td>
      </tr>
      <tr>
        <td class="alileft">Company: {{$orderDetails->user->client->company }}</td>
      </tr>
      <tr>
        <td class="alileft">Address 1: {{ $orderDetails->user->client->address1}} Address 2: {{ $orderDetails->user->client->address2 }}
          Postal Code: {{ $orderDetails->user->client->postalcode}} Country: {{ $orderDetails->user->client->country->name }}</td>
      </tr>
      <tr>
        <td class="alileft">Tel: {{ $orderDetails->user->client->phone_number}}<br/>Email: {{ $orderDetails->user->email}} </td>
      </tr>

    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <div align="left"><h5 class="caps"><b>Invoice Items</b></h5></div>
      <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product/Services</th>
                    <th>Cycle</th>
                    <th>Qty</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orderDetails->orderItems as  $key => $value) 
                  <?php 
                        
                        if($value['price'] != ''){
                          $row_price = $value['price'];
                        }else{
                          $row_price = 0.00;
                        }
                  ?>
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                      <div class="pull-left">
                          <!-- <b>Service Code: </b> <span class="sitecolor">DN</span><br/> -->
                          <b>Domain Registration:</b> <span class="sitecolor">{{$value['services']}}</span><br/>
                           @if($value['plan_id'] != NULL)
                           @foreach($plans as $plan)
                           @if($value['plan_id'] == $plan->id)
                           <?php $discount = App\Models\Promotion::get_discount($value['plan_id']);
                           if($discount != NULL){
                             $discount = json_decode(json_encode($discount));
                            
                            if($discount->discount_by == 'amount'){
                              $discount = $discount->discount;
                            }else{
                              $discount = ( $value['price'] * $discount->discount / 100);
                            }
                           }else{
                            $discount = 0.00;
                           } 
                            ?>
                           <b>Service Code: </b> <span class="sitecolor">{{!empty($plan->service_code) ? $plan->service_code : ''}}</span><br/>
                           <b>Hosting Plan:</b> <span class="sitecolor caps">{{!empty($plan->plan_name) ? $plan->plan_name : ''}}</span><br/>
                            @endif
                            @endforeach
                            @else
                              <b>Service Code: </b> <span class="sitecolor">DN</span><br/>
                              <?php $discount = 0.00; ?>
                          @endif
                          <?php if(isset($value['addons']) && $value['addons'] != "" && $value['addons'] != null){
                              $addons_vl = explode(',', $value['addons']); ?>
                              

                          <b>Domain Addons:</b>
                          <ul>
                              
                          
                          @foreach($addons_vl as $addon)
                          @foreach($domain_pricings as $dprice)
                          <?php 
                          if($addon == $dprice->id){ 
                              $row_price += $dprice->price;
                          ?>
                          <li><i class="fa icon-arrow-right"></i>{{$dprice->title}} (RM {{ number_format($dprice->price, 2) }})</li>
                         <?php }
                          ?>
                            
                          @endforeach
                          @endforeach
                          </ul>

                          <?php } ?>
                          @if(!empty($plan_details))
                            <b>Server Specification:</b>
                            <ul>
                                @if(!empty($featured_plans) && count($featured_plans)>0 && count($plans)>0)
                                  @foreach($featured_plans as $i)         
                                    @php
                                      $details = App\Models\PlanFeatureDetail::where('plan_feature_id', $i->id)->where('plan_id', $plans->id)->first();
                                    @endphp
                                    @if ($details)
                                    <li><i class="fa icon-arrow-right"></i>&nbsp;&nbsp;{{$i->title}}:
                                      <span data-sel="{{$i->title}}">{{ $details->description }}</span>
                                    </li>
                                    @endif
                                  @endforeach
                                @endif
                            </ul>
                          @endif
                      </div>
                    </td>
                    <td><div class="pull-left">{{$value['cycle']}} <?php if($value['cycle'] == 1) echo "year"; else echo "years"; ?></div></td>
                    <td>{{$value['qty']}}</td>
                    <td>RM {{ number_format($row_price,2)}}
                    </td>
                  </tr>
                  <?php $total_price += $row_price; 
                      $discount_price += $discount; 
                    ?>
                  @endforeach 
                  <?php
                  $grand_total = $total_price - $discount_price;  
                  ?>  
                  
                </tbody>
                <tfoot>
              <tr>
                <td colspan="2"><div align="right"><h6 class="caps"><b>Subtotal</b></h6></div></td>
                <td></td>
                <td></td>
                <td><div align=""><h6><b>RM {{number_format($total_price, 2)}}</b></h6></div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="right"><h6 class="caps"><b>Discount</b></h6></div></td>
                <td></td>
                <td></td>
                <td>

                  <div align=""><h6 class="red"><b>- RM {{number_format($discount_price, 2)}}</b></h6></div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="right"><h6 class="caps"><b>6% GST</b></h6></div></td>
                <td></td>
                <td></td>
                <td><div align=""><h6><b>RM 0.00</b></h6></div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="right"><h5 class="caps"><b>Total</b></h5></div></td>
                <td></td>
                <td></td>
                <td><div align=""><h5 class="red"><b>RM {{number_format($grand_total, 2)}}</b></h5></div></td>
              </tr>
            </tfoot>
    </table>    
        </td>
  </tr>
</table>

    
</div>
  </body>
</html>