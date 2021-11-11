<?php


//Code to Add a new Courier by the manager
// $library = new SimpleXMLElement('courier.xml',null,true);
// $book = $library->addChild('Courier');
// $book->addAttribute('courierId', '124');
// $book->addChild('mangerId',"567");
// $sub=$book->addChild('From');
// $sub->addChild('userId',"987");
// $bus=$book->addChild('To');
// $bus->addChild('Name',"Shami");
// $bus->addChild('Address',"Tamil Nadu");
// $bus->addChild('Contact',"10112");
// $bus->addChild('Email',"shami@gmail.com");
// $book->addChild('Type',"Speed");
// $book->addChild('Qty',"1");
// $book->addChild('Fees',"400");
// $book->addChild('Status',"Shipped");
// $book->addChild('Feedback',"N");
// $library->asXML('courier.xml');

//To change an Attribute
// $library->xpath('//Courier[@courierId="123"]')[0]->attributes()['courierId']= '111';


//Code to Update Package delivery status by the manager
// $library = new SimpleXMLElement('courier.xml',null,true);
// $book = $library->xpath('//Courier[@courierId="123"]');
// $book[0]->Status= 'Shipped';
// $library->asXML('courier.xml');

//Code to get the all the details about the courier
// $library = new SimpleXMLElement('courier.xml',null,true);
// $Name = $library->xpath('//Courier[@courierId="123"]/From/Name')[0];
// echo $book;

//Code to give rating to the Delivery
// $library = new SimpleXMLElement('courier.xml',null,true);
// $book = $library->xpath('//Courier[@courierId="123"]');
// $book[0]->FeedBack= 'Great Experience';

//Code to add a Manager by the admin
// $manages = new SimpleXMLElement('manager.xml',null,true);
// $manage = $manages->addChild('Manager');
// $manage->addAttribute('managerId', '984');
// $manage->addChild('Password',"Document123");
// $manage->addChild('Name',"Ravi");
// $manage->addChild('Address',"Delhi");
// $manage->addChild('Contact',"475");
// $manage->addChild('Email',"ravi@gmail.com");
// $manage->addChild('Branch',"Chennai");
// $manages->asXML('manager.xml');


//Code to delete a Manager by the admin
// $dom = new DOMDocument();
// $dom->load('manager.xml');
// $library = $dom->documentElement;
// $xpath = new DOMXPath($dom);
// $result = $xpath->query('//Manager[@managerId="984"]');
// $result->item(0)->parentNode->removeChild($result->item(0));
// $dom->save('manager.xml');

//Code to Add a new Customer by themselves
// $library = new SimpleXMLElement('customer.xml',null,true);
// $book = $library->addChild('Customer');
// $book->addAttribute('userId', '124');
// $book = $library->addChild('Password','computer');
// $book = $library->addChild('Name','Bob');
// $book = $library->addChild('Address','San Francisco, California');
// $book = $library->addChild('Contact','84769');
// $book = $library->addChild('Email','bob@gmail.com');
// $library->asXML('customer.xml');

?>
