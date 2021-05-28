@php
    $newString = setting_val('purchace_email');  
    $newString = str_replace("{{app_name}}", "".setting_val('APP_NAME')."", $newString);  
    $newString = str_replace("[Company Name, LLC]", "".setting_val('APP_NAME')."", $newString);  
    $newString = str_replace("{{pro_details}}", "Invoice Upgrade to ".$details['member']->name."", $newString); 
    $newString = str_replace("{{name}}", "". Auth::user()->name."", $newString);  
    $newString = str_replace("{{item1}}", "".$details['member']->name."", $newString);  
    $newString = str_replace("{{price}}", "".setting_val('CURRENCY_TYPE')." ".$details['member']->price."", $newString);  
    $newString = str_replace("{{qty}}", "1", $newString);  
    $newString = str_replace("{{total}}", "".setting_val('CURRENCY_TYPE')." ". ($details['member']->price*1)."", $newString);  
    $newString = str_replace("{{Payed}}", "".setting_val('CURRENCY_TYPE')." ". ($details['member']->price*1)."", $newString);  
    $newString = str_replace("{{address}}", "".setting_val('address')." ". ($details['member']->price*1)."", $newString);  
    $newString = str_replace("{{city}}", "".setting_val('city')."", $newString);  
    $newString = str_replace("{{state}}", "".setting_val('state')."", $newString);  
    $newString = str_replace("{{country}}", "".setting_val('country')."", $newString);  
    $newString = str_replace("{{zip}}", "".setting_val('zip')."", $newString);  
    // echo $newString;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?=  $newString?>
</body>
</html>
