<?php 
    
    // asmx URL of WSDL - URL ou WDSL asmx
    $soapUrl = "https://connecting.website.com/soap.asmx?op=DoSomething";

    // xml structure - estrutura do xml
    $input_xml =
        '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:uc3="http://www.example.org/ConsultaListaEventosAprovados/">
            <soapenv:Header />                        
                <soapenv:Body>                        
                    <dataInicio></dataInicio>                        
                </soapenv:Body>                        
        </soapenv:Envelope>';
                            
    $ch = curl_init();
    $username = 'user';
    $password = 'password';

    //encod username and password in base64 - 'encondando' login e senha em base64
    $encode_64 = base64_encode("$username:$password");
    $authentication = "Basic $encode_64";
    curl_setopt($ch, CURLOPT_URL, $soapUrl);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = [
        "Content-Type: application/xml",
        "Authorization: $authentication"
    ];
                            
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

    //converting 1 - conversão 1 
    $data = curl_exec($ch);
    curl_close($ch);

    // converting 2 - conversão 2
     $response1 = str_replace("<soap:Body>","",$response);
     $response2 = str_replace("</soap:Body>","",$response1);

     // converting to XML - convertendo para XML
     $parser = simplexml_load_string($response2);

     // user $parser to get your data out of XML response and to display it 
     // usando o parser para obter seus dados da resposta XML e exibi-los
     
?>