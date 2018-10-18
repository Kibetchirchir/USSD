<?xml version="1.0" encoding="UTF-8"?>
<xml-api
        xmlns="http://ussd.infobip.com"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://ussd.infobip.com
https://sp.infobip.com/Programmes/USSD/Public/SalesToolkit/API/xml-api-v3.1.xsd">
    <configuration>
        <property name="pageNextMenu" value="#Intro" /> <!-- the first menu on the page -->
        <property name="firstMenuName" value="#Intro" /> <!-- the first menu in the session -->
        <property name="lastMenuName" value="#DefaultExit" /> <!-- used by the exit option -->
    </configuration>
    <messages>
        <selection name="Intro">
            <title>Welcome to posta</title>
            <option choice="1" ref="#myPosta" text="My posta" />
            <option choice="2" ref="#mail" text="Mail" />
            <option choice="3" ref="#Mpost" text="Mpost" />
            <option choice="4" ref="#paymentServices" text="Payment services" />
            <option choice="00" ref="#DefaultExit" text="exit"/>
-->
            <remember-history value="true" /> <!-- stores this menu in the back option history -->
            <ref>#Intro</ref> <!-- if the user doesn't select any of the above options, display this menu
again -->
        </selection>
        <!-- myPosta -->
        <selection name="myPosta">
            <title>My posta</title>
            <option choice="1" ref="#buyNewbox" text="Buy new box" />
            <option choice="2" ref="#renewSubscription" text="Renew subscription" />
            <option choice="3" ref="#checkStatus" text="Check status" />
            <option choice="4" ref="#renewSubscription" text="Update details" />
            <option choice="5" ref="#trackItem"  text="Track item"/>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <remember-history value="true" />
            <ref>#myPosta</ref>
        </selection>
        <!-- #trackItems -->
        <input name="trackItem">
        <text>Enter the tracking number then press OK
        </text>
        <store-response variable="trackingNumber" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#trackItems</ref>
        </input>
        <submit name="trackItems">
            <method>POST</method>
            <url>https://ticketsoko.com/ussd.php</url>
            <variable>trackingNumber</variable>
            <ref>#trackItemsConfirm</ref>
        </submit>
        <!-- trackItemsConfirm -->
        <selection name="trackItemsConfirm">
            <title>your item ref 00021 is on transit to Nairobi
            </title>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <ref>#Intro</ref>
        </selection>

        <!-- Mpost -->
        <selection name="Mpost">
            <title>mPost sits here</title>

            <back /> <!-- generates an option "b. Back" which links to the previous menu which has
remember-history value="true" -->
            <exit />
            <remember-history value="true" />
            <ref>#Intro</ref>
        </selection>
        <!-- Courier -->
        <selection name="Courier">
            <option choice="1" ref="#API" text="Courier sits here"/>

            <back /> <!-- generates an option "b. Back" which links to the previous menu which has
remember-history value="true" -->
            <exit />
            <remember-history value="true" />
            <ref>#Intro</ref>
        </selection>
        <!-- posta parcel -->
        <selection name="postaParcel">
            <option choice="1" ref="#API" text="Posta parcel sits here"/>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <remember-history value="true" />
            <ref>#Intro</ref>
        </selection>
        <!-- payment services -->
        <selection name="paymentServices">
            <title>Choose account you want to pay</title>
            <option choice="1" ref="#DSTV" text="DSTV"/>
            <option choice="2" ref="#DSTV" text="Nairobi water"/>
            <option choice="3" ref="#DSTV" text="County water"/>
            <option choice="4" ref="#DSTV" text="Telkom kenya"/>
            <option choice="5" ref="#DSTV" text="Kenya power"/>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <remember-history value="true" />
            <ref>#paymentServices</ref>
        </selection>

        <selection name="mail">
            <title>Please select box to apply for:</title>
            <option choice="1" ref="#Boxes" text="Corporate"/>
            <option choice="2" ref="#Boxes" text="Individual"/>
            <option choice="3" ref="#Boxes" text="Special corporate"/>
            <option choice="4" ref="#Boxes" text="Learning and Religious"/>
            <option choice="5" ref="#Boxes" text="Sub post office"/>
            <option choice="6" ref="#Boxes"   text="Stand alone boxes"/>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <remember-history value="true" />
            <ref>#mail</ref>
        </selection>

        <!-- payments -->
        <input name="DSTV">
        <text>Enter you subcription,
        </text>
        <store-response variable="sub" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#DSTV2</ref>
        </input>
        <submit name="DSTV2">
            <method>POST</method>
            <url>https://ticketsoko.com/ussd.php</url>
            <variable>DSTV</variable>
            <ref>#DefaultExit</ref>
        </submit>
        <selection name="DSTVconfirm">
            <title>Request received please check your phone and wait to complete payments
            </title>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <ref>#DSTVconfirm</ref>
        </selection>
        <!-- boxes -->
        <input name="Boxes">
        <text>Enter name then press ok
        </text>
        <store-response variable="pin" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#Boxes2</ref>
        </input>
        <submit name="Boxes2">
            <method>POST</method>
            <url>https://ticketsoko.com/ussd.php</url>
            <variable>DSTV</variable>
            <ref>#Boxesconfirm</ref>
        </submit>
            <bye name="Boxesconfirm" language="GSM-7">

                <!--
               This text will be sent as a USSD notification (no reply allowed)
               to the user's cell phone and the session will end.
               -->
                <text>press OK and enter your Mpesa pin .</text>
            </bye>
        <!-- renewSubscription -->
        <input name="renewSubscription">
        <text>Enter box number then press ok
        </text>
        <store-response variable="box" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#renewSubscription2</ref>
        </input>

        <submit name="renewSubscription2">
            <method>POST</method>
            <url>https://ticketsoko.com/ussd.php</url>
            <variable>box</variable>
            <ref>#DefaultExit</ref>
        </submit>
        <!-- renewSubscriptionConfirmed -->
            <bye name="renewSubscription2" language="GSM-7">

                <!--
               This text will be sent as a USSD notification (no reply allowed)
               to the user's cell phone and the session will end.
               -->
                <text>Press OK and enter your Mpesa pin</text>
            </bye>
        <!-- checkStatus -->
        <input name="checkStatus">
        <text>Enter box number then press ok
        </text>
        <store-response variable="box" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#checkStatus2</ref>
        </input>

        <submit name="checkStatus2">
            <method>POST</method>
            <url>https://ticketsoko.com/</url>
            <variable>box</variable>
            <ref>#checkStatusconfirmed</ref>
        </submit>
        <!-- renewSubscriptionConfirmed -->
        <selection name="checkStatusconfirmed">
            <title>request received. you have 3 mails  on your box
            </title>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <ref>#Intro</ref>
        </selection>
        <selection name="checkStatusconfirmed">
            <title>request received. you have 3 mails  on your box
            </title>
            <option choice="0" ref="#Intro"  text="Main menu"/>
            <option choice="00" ref="#DefaultExit" text="exit"/>
            <ref>#Intro</ref>
        </selection>
        <input name="buyNewbox">
        <text>Enter your ID number and press ok
        </text>
        <store-response variable="box" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#newboxID</ref>
        </input>
        <input name="newboxID">
        <text>Enter county name
        </text>
        <store-response variable="box" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#newboxcounty</ref>
        </input>
        <input name="newboxcounty">
        <text>Enter town or city
        </text>
        <store-response variable="box" /> <!-- the user's reply will be stored in the pin variable -->
        <!--
        This is only an example menu.
        The XML for a real app would have a submit element after this input element
        which would specify a service URL. This would send the pin variable value to the service
        so that the user's banking transaction (paying the telecom bill) is executed.
        -->
        <ref>#DSTV2</ref>
        </input>

        <bye name="DefaultExit" language="GSM-7">

            <!--
           This text will be sent as a USSD notification (no reply allowed)
           to the user's cell phone and the session will end.
           -->
            <text>Press OK and enter your Mpesa pin</text>
        </bye>
    </messages>
</xml-api>


