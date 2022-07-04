<?php
/**
* The template for managing all agreements.
*/

function distributorAgreement($user_id="") {
    if(!$user_id) {
        $user_id = get_current_user_id();
    }
    $company_name = get_user_meta($user_id, 'dokan_company_name', true);
    $company_address = get_user_meta($user_id, 'billing_address_1', true) . ', ' . get_user_meta($user_id, 'billing_address_2', true) . ', ' . get_user_meta($user_id, 'billing_city', true) . ', ' . get_user_meta($user_id, 'billing_state', true) . ', ' . get_user_meta($user_id, 'billing_country', true) . ', ' . get_user_meta($user_id, 'billing_postcode', true);
    $company_director = get_user_meta($user_id, 'first_name', true) . ' ' . get_user_meta($user_id, 'last_name', true);
    $agreement = '
        THIS AGREEMENT IS MADE AT NASHIK ON THIS 21<sup>ST</sup> DAY OF APRIL 2022 BETWEEN VITRAK EXTENDREACH PRIVATE LIMITED, A COMPANY INCORPORATED UNDER THE PROVISIONS OF COMPANIES ACT, 2013 HAVING ITS REGISTERED OFFICE AT FLAT NO 2, S NO. 411/2/1, OLD NASIK NEAR RAMRAJA SOCIETY NASHIK NASHIK MH 422001 IN (ACTING THROUGH MR. PRAFUL POONAMCHAND JAIN, DULY AUTHORIZED TO ENTER IN TO PRESENT AGREEMENT BY BOARD OF DIRECTORS) (HEREINAFTER REFERRED TO AS “THE COMPANY”) OF THE FIRST PART
        <br><br>
        AND
        <br><br>
        ' . $company_name . ', A COMPANY/PARTNERSHIP COMPANY HAVING ITS OFFICE AT ' . $company_address . ' THROUGH ITS PARTNER/DIRECTORS ' . $company_director . ' DULY AUTHORIZED BY PARTNERS/BOARD OF DIRECTORS OF THE COMPANY/COMPANY TO ENTER IN TO PRESENT AGREEMENT (HEREINAFTER REFERRED TO AS “DISTRIBUTOR”) OF SECOND PART
        
        &nbsp;
        <br>
        WHEREAS
        <ol>
            <li>The <strong>DISTRIBUTOR</strong> is being engaged by the COMPANY as clearing and forwarding agent for delivery of commodities/consignment, and it is the sole intention of the parties that the DISTRIBUTOR shall solely be engaged as the transporter and offer transportation services for all the commodities/consignment.</li>
            <li>The <strong>DISTRIBUTOR</strong>, holding a valid operator’s license and having complied with all statutory provisions and being of good repute, financial standing, and professional competence, and operating authorized motor vehicles with a suitable management and maintenance team, runs and operates a network of inland haulage services within India, (hereinafter referred to as “the Territory”); and</li>
            <li>The <strong>DISTRIBUTOR</strong> shall at all times make and keep available sufficient motor vehicles over which the DISTRIBUTOR holds due legal title or ownership or control; and at all times fully compliant with all and any legislative requirements within the Territory; and</li>
            <li>The <strong>DISTRIBUTOR</strong> shall from time to time take delivery of or deliver consignments to and from the COMPANY or as per directions from the COMPANY for delivery of the said consignments to the COMPANY’s final destination.</li>
            <li>The DISTRIBUTOR is prepared, ready, willing, and able to offer the Company haulage services for the carriage of consignments within the specified area in the Territory, and the COMPANY is prepared to make use of the DISTRIBUTOR’s haulage services covering the specified area of the Territory; and</li>
            <li>The COMPANY and the DISTRIBUTOR intend to give their cooperation and secure footing by executing this Agreement on the date aforementioned</li>
        </ol>
        &nbsp;
        
        WHEREBY IT IS AGREED EXPRESSLY AS FOLLOWS:
        <ol>
            <li>DEFINITIONS</li>
        </ol>
        <p style="padding-left: 40px;">“Consignment” means goods in bulk or contained in one parcel, package, or container, as the case may be, or any number of separate parcels, packages, or containers transported at one time in one load for the Sender from one destination to another.</p>
        &nbsp;
        <ol start="2">
            <li>APPOINTMENT AS DITRIBUTOR
        <ul>
            <li>Subject to the provision of the agreement, the Company hereby appoints the distributor and distributor accepts such appointment, as a non-exclusive distributor of the company without any territorial rights for selling the products and for providing the services.</li>
            <li>The distributor agrees and acknowledges that the company may sell the products directly or indirectly to the customers or appoint other distributors for sale or distribution.</li>
        </ul>
        </li>
        </ol>
        &nbsp;
        <ol start="3">
            <li>COMMENCEMENT</li>
        </ol>
        <p style="padding-left: 40px;">The agreement shall be deemed to have commenced from the dtae of execution of this agreement or from the date as may be agreed by the parties in writing, hereunder referred to as the commencement date.</p>
        &nbsp;
        <ol start="4">
            <li>The DISTRIBUTOR Obligations</li>
        </ol>
        <p style="padding-left: 40px;">The DISTRIBUTOR shall:</p>
        
        <ul>
            <li style="list-style-type: none;">
        <ul>
            <li>Collect and deliver the consignment to be carried as instructed by the COMPANY.</li>
            <li>Immediately inform the COMPANY of any unusual delay.</li>
            <li>In the event of loss, damage, or misdelivery, immediately inform the COMPANY and thereafter supply a detailed statement from the driver and the loader of the cause and circumstances, together with any further information that the COMPANY may require.</li>
            <li>If any loss is or is suspected to be due to theft or pilferage, in addition to the action under 2.3 above, immediately inform the police and provide all the assistance required in tracing or recovering the consignment and apprehending the guilty persons.</li>
            <li>In the event of an accident, the DISTRIBUTOR shall immediately/at the earliest, obtain and deliver to the COMPANY a detailed statement from the driver and the loader together with a police report in respect of the accident along with the waybill(s) and accompanying documents relating to the consignment.</li>
            <li>Where necessary and at request of the COMPANY, provide an independent survey report.</li>
            <li>Handle the consignment with utmost care from the time of collection from warehouse to delivery point.</li>
            <li>Be responsible for all damage to COMPANY’s commodities arising whilst in its custody and/or control where the same arise from either the DISTRIBUTOR’s or DISTRIBUTOR’s transporter’s negligent act or omission, provided the DISTRIBUTOR’s legal liability is proven. For damaged or missing bags/tins/units of commodities in transportation, COMPANY destination office will indicate the losses on the waybill presented by the DISTRIBUTOR.</li>
            <li>Offer to the COMPANY vehicles for which it has a due legal title of ownership, and ensure that the vehicles are maintained in a roadworthy condition.</li>
            <li>Obtain and maintain and/or ensure all road service permits, licenses, weights, and measures and other approvals necessary, and make timely application for the same when they fall due.</li>
            <li>Be responsible for issuing the damages reports for all insurance claims that come to its knowledge and/or noted directly throughout the whole route, sending a copy of same to the</li>
            <li>Keep the COMPANY duly informed in respect of the situation of each expedition/shipment and/or of any incidents or problems that may occur (opening of containers in customs, incidents in the handling, breakage or damages, etc.) In case of breakage, damage, loss, or robbery of the merchandise, an immediate report of the situation should be made in order to keep the Insurance Company duly informed.</li>
            <li>Inform the COMPANY by email of departure of commodities from the central warehouse.</li>
            <li>Confirm by email the departure of the commodities.</li>
            <li>Confirm by email the arrival of the consignment at final destination.</li>
        </ul>
        </li>
        </ul>
        &nbsp;
        <ol start="5">
            <li>COMPANY Obligations</li>
        </ol>
        <p style="padding-left: 40px;">The COMPANY shall:</p>
        
        <ul>
            <li style="list-style-type: none;">
        <ul>
            <li>Ensure that all Products will be safe for transport and handling provided the same is dealt with by the DISTRIBUTOR in accordance with all reasonable instructions given by the COMPANY and good industrial practices in transport, distribution, and warehousing.</li>
            <li>Indemnify the DISTRIBUTOR in case the obligations specified in this clause and other provisions of the Agreement are not fulfilled by the COMPANY.</li>
            <li>Ensure that the packaging of the Products and the nature of consignment comply with all applicable Laws.</li>
            <li>At its own cost, repackage or give instructions on repackaging upon notification by the DISTRIBUTOR of any apparent poor packaging of the consignment.</li>
        </ul>
        </li>
        </ul>
        &nbsp;
        <ol start="6">
            <li>ASSIGNMENT OF CONTRACT
        <ul>
            <li>The DISTRIBUTOR may assign, transfer, or sub-contract obligations under this Carriage Agreement and its performance or any benefit hereunder whether wholly or partly, to any person, Firm, Company, or otherwise</li>
            <li>Notwithstanding the transfer or subcontracting made by the DISTRIBUTOR in this regard, the DISTRIBUTOR will remain liable to the COMPANY in accordance to the provisions and performance of this agreement.</li>
        </ul>
        </li>
        </ol>
        &nbsp;
        <ol start="5">
            <li>CONSIGNMENT</li>
        </ol>
        <p style="padding-left: 40px;">5.1      Where the consignment is containerized, the DISTRIBUTOR shall forthwith return the container(s) after transportation and/or delivery to the final destination or destinations, in a good state of repair to the COMPANY within the period stipulated in this agreement except where otherwise specified in writing by the Sender.</p>
        <p style="padding-left: 40px;">5.2      However, should the DISTRIBUTOR neglect to, fail to, or otherwise not return the subject container(s) as provided in this Agreement, the Carrier shall be liable for damage or loss, if any, to the container, as well as for demurrage charges as specified under Clause 6 hereof.</p>
        &nbsp;
        <ol start="6">
            <li>WAITING CHARGES</li>
        </ol>
        <p style="padding-left: 40px;">The COMPANY shall pay waiting and demurrage charges unless it is proven beyond any reasonable doubt that the delay caused is due to the sole negligence of the Sender, its agents, and or servants.</p>
        &nbsp;
        <ol start="7">
            <li>INSURANCE
        <ul>
            <li>The COMPANY shall procure Marine, Goods In Transit, and material damage insurance policies from door to door, covering all risks for the goods handled and transported by the DISTRIBUTOR.</li>
            <li>The COMPANY shall procure an Industrial All Risks insurance policy to cover their premises where Products under the bond and lien of the Customs and Excise Department are to be stored. This cover shall include but not be limited to fire, burglary, and consequential losses.</li>
            <li>The DISTRIBUTOR shall procure adequate insurance policies to cover any legal liability that may arise during the performance of its obligations under the contract.</li>
        </ul>
        </li>
        </ol>
        &nbsp;
        <ol start="7">
            <li>FORCE MAJEURE
        <ul>
            <li>Both parties shall be fully or partially waived of their contractual obligations when a case of FORCE MAJEURE occurs. FORCE MAJEURE shall be considered as all unforeseeable acts or events, or even when these are foreseeable, which are inevitable, unsolvable, or beyond the control of the parties.</li>
            <li>Should an event arise that constitutes a case of FORCE MAJEURE, the obligations affected shall be extended automatically for a term equal to the delay caused by the case of FORCE MAJEURE.</li>
            <li>Any of the party invoking a case of FORCE MAJEURE must, immediately after this arises, expressly notify the other party. That notification shall be completed with a report that shall contain all the circumstances related to the case of FORCE MAJEURE, within the seven (7) calendar days following its occurrence.</li>
            <li>All cases of FORCE MAJEURE not notified in accordance with the conditions and forms aforementioned may not, under any circumstances, be taken into account or claimed.</li>
            <li>Under such a circumstances, the party affected must take all the necessary means to resume, as soon as possible, normal execution of the obligations affected by the case of FORCE MAJEURE, as well as minimization of costs and damages.</li>
            <li>Both parties shall bear the consequences to them of all kinds of FORCE MAJEURE and may not claim any kind of compensation from the other.</li>
            <li>In the event of the FORCE MAJEURE persisting and being prolonged for a period exceeding three (3) months, both parties shall meet to examine the consequences of that FORCE MAJEURE. After a period exceeding six (6) further months, the parties will be automatically reciprocally released of their obligations.</li>
        </ul>
        </li>
        </ol>
        &nbsp;
        <ol start="7">
            <li>ARBITRATION</li>
        </ol>
        <p style="padding-left: 40px;">Should any dispute or difference of any kind whatsoever arise between the parties herein, the matter in question shall be resolved amicably by mutual discussion as a principle. However, when such settlement cannot be reached, the matter shall be referred for the settlement by an arbitrator to be mutually agreed upon by the parties. In default of agreement, an arbitrator shall be appointed by the Chairman for the time being of the in accordance with the The Arbitration and Conciliation (Amendment Act), 2021 or any statutory modification or re-enactment of it for the time being in force. The decision of such arbitrator shall be conclusive and binding on the parties herein.</p>
        &nbsp;
        <ol start="10">
            <li>CONFIDENTAILTY</li>
        </ol>
        <p style="padding-left: 40px;">Unless where expressly required by Statute, this Agreement, its terms, and purport shall not be divulged to any third party or at all-either in part or in its entirety-without the consent in writing of the Company. Any commercial information that may become available to the DISTRIBUTOR in the performance of this Agreement shall not be divulged to any third party or at all. Both parties shall ensure that their servants, agents, and/or employees comply with this Article.</p>
        &nbsp;
        <ol start="11">
            <li>ENTIRE AGREEMENT AND AMENDMENT
        <ul>
            <li>This Agreement is intended by the parties to be the final expression of their agreement as to the subject matter herein, and constitutes the entire understanding between them with respect thereto. It is a complete and exclusive statement of the terms and conditions of such understanding, and shall supersede any and all prior correspondence, conversations, negotiations, understandings, or agreements relating to the same subject matter.</li>
            <li>All amendments shall be made by mutual agreement and no change in, modification of, and/or addition to the terms and conditions of this Agreement shall be valid unless embodied in a memorandum or other written notice executed by both parties herein.</li>
            <li>The English text shall prevail over any translation of this Agreement.</li>
        </ul>
        </li>
        </ol>
        &nbsp;
        <ol start="11">
            <li>WARRANTY</li>
        </ol>
        <p style="padding-left: 40px;">Each of the parties to this Agreement warrants its authority under its instruments of incorporation and other regulatory and policy documents to enter into this Contract and has obtained all necessary approvals to do so and further as provided under the laws of India.</p>
        &nbsp;
        <ol start="13">
            <li>Law and Jurisdiction</li>
        </ol>
        <p style="padding-left: 40px;">This Agreement shall be construed and the relations between the parties determined in accordance with the Laws of India.</p>
    ';
    
    return $agreement;
}
add_shortcode('distributor_agreement', 'distributorAgreement');