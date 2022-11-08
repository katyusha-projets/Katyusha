<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string period
 * @property int numberofsignificantvendors
 * @property int a20132021debtissuancesmember
 * @property int federalincometaxexpensebenefitcontinuingoperations
 * @property int othercomprehensiveincomelossavailableforsalesecuritiesadjustmentnetoftax
 * @property int deferredtaxassetsliabilitiesnet
 * @property int debtinstrumentmaturityyearrangestart
 * @property int othernoncashincomeexpense
 * @property int weightedaveragenumberofdilutedsharesoutstanding
 * @property int sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsnonvestednumber
 * @property int marketablesecuritiescurrent
 * @property string notradingsymbolflag
 * @property int incomelossfromcontinuingoperationsbeforeincometaxesforeign
 * @property string crosscurrencyinterestratecontractmember
 * @property int deferredtaxliabilitiesother
 * @property int deferredtaxassetsother
 * @property string maximumlengthoftimeforeigncurrencycashflowhedge
 * @property int proceedsfromrepaymentsofshorttermdebtmaturinginthreemonthsorless
 * @property int proceedsfromrepaymentsofshorttermdebtmaturinginmorethanthreemonths
 * @property int incometaxreconciliationtaxcreditsresearch
 * @property int financeleaseliabilitypaymentsdueyearfour
 * @property int increasedecreaseinotheroperatingassets
 * @property string costofgoodsandservicessold
 * @property int unrecordedunconditionalpurchaseobligationbalanceonfourthanniversary
 * @property int financeleaseliabilitypaymentsdueyearthree
 * @property int tradeaccountsreceivablemember
 * @property int lesseeoperatingandfinanceleaseliabilitytobepaidyearfive
 * @property int derivativeliabilitiesreductionformasternettingarrangementsincludingtheeffectsofcollateral
 * @property string grossprofit
 * @property int cashmember
 * @property int incometaxespaidnet
 * @property int operatingleasecost
 * @property int interestexpense
 * @property int lesseeoperatingandfinanceleaseleasenotyetcommencedpaymentsdue
 * @property int deferredtaxassetsothercomprehensiveloss
 * @property int lesseeoperatingandfinanceleaseliabilitytobepaidyeartwo
 * @property int incometaxreconciliationstateandlocalincometaxes
 * @property int financeleaseliabilitynoncurrent
 * @property string availableforsalesecuritiesdebtmaturitiessinglematuritydate
 * @property int contractwithcustomerliability
 * @property int financeleaseliability
 * @property int accumulatedothercomprehensiveincomemember
 * @property int adjustmentstoadditionalpaidincapitalsharebasedcompensationrequisiteserviceperiodrecognitionvalue
 * @property int landandbuildingmember
 * @property int availableforsaledebtsecuritiesaccumulatedgrossunrealizedgainbeforetax
 * @property int unrecognizedtaxbenefits
 * @property int increasedecreaseincontractwithcustomerliability
 * @property int paymentsforproceedsfromotherinvestingactivities
 * @property string entitysmallbusiness
 * @property string lesseeoperatingandfinanceleaseleasenotyetcommencedtermofcontract
 * @property int accountspayablecurrent
 * @property int debtinstrumentcarryingamount
 * @property int proceedsfrommaturitiesprepaymentsandcallsofavailableforsalesecurities
 * @property int investmentincomeinterestanddividend
 * @property int sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsforfeitedinperiod
 * @property int entityaddresspostalzipcode
 * @property int comprehensiveincomenetoftax
 * @property string liabilitiesandstockholdersequity
 * @property int deferredincometaxliabilities
 * @property int propertyplantandequipmentgross
 * @property int lesseeoperatingleaseliabilityundiscountedexcessamount
 * @property string tradingsymbol
 * @property float sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsvestedinperiodweightedaveragegrantdatefairvalue
 * @property string documenttransitionreport
 * @property string documentfiscalperiodfocus
 * @property int currentstateandlocaltaxexpensebenefit
 * @property int availableforsalesecuritiesdebtmaturitiesrollingyeartwothroughfivefairvalue
 * @property float commonstockdividendspersharedeclared
 * @property int restrictedstockunitsrsumember
 * @property int othercomprehensiveincomeunrealizedholdinggainlossonsecuritiesarisingduringperiodnetoftax
 * @property int increasedecreaseinotherreceivables
 * @property int lesseeoperatingandfinanceleaseliabilitytobepaidyearone
 * @property string debtinstrumentterm
 * @property int commonstockincludingadditionalpaidincapitalmember
 * @property string entitycurrentreportingstatus
 * @property string entityshellcompany
 * @property int sellinggeneralandadministrativeexpense
 * @property int auditorfirmid
 * @property int accumulatedothercomprehensiveincomelossnetoftax
 * @property int unrecordedunconditionalpurchaseobligationbalanceonsecondanniversary
 * @property int currentforeigntaxexpensebenefit
 * @property string entityemerginggrowthcompany
 * @property int restrictedinvestments
 * @property int nonoperatingincomeexpense
 * @property string auditorname
 * @property int effectiveincometaxratereconciliationfdiiamount
 * @property int deferredtaxassetsnet
 * @property string entitytaxidentificationnumber
 * @property int propertyplantandequipmentnet
 * @property int weightedaveragenumberofsharesoutstandingbasic
 * @property string commonstockmember
 * @property int commonstocksharesoutstanding
 * @property int lesseeoperatingleaseliabilitypaymentsdue
 * @property string incomelossfromcontinuingoperationsbeforeincometaxesextraordinaryitemsnoncontrollinginterest
 * @property int unrecordedunconditionalpurchaseobligationbalancesheetamount
 * @property int stockissuedduringperiodvaluenewissues
 * @property int stockrepurchasedandretiredduringperiodvalue
 * @property int accountsreceivablenetcurrent
 * @property int lesseeoperatingandfinanceleaseliabilityundiscountedexcessamount
 * @property int othernonoperatingincomeexpense
 * @property int lesseeoperatingleaseliabilitypaymentsdueafteryearfive
 * @property int derivativeassetfairvaluegrossassetincludingnotsubjecttomasternettingarrangement
 * @property string liabilitiescurrent
 * @property int sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsvestedinperiod
 * @property int proceedsfrompaymentsforotherfinancingactivities
 * @property int losscontingencyestimateofpossibleloss
 * @property int longtermdebtfairvalue
 * @property int paymentstoacquirebusinessesnetofcashacquired
 * @property int lesseeoperatingleaseliabilitypaymentsdueyeartwo
 * @property int deferredtaxliabilitiesothercomprehensiveincome
 * @property int cashcashequivalentsrestrictedcashandrestrictedcashequivalents
 * @property int proceedsfromsaleofavailableforsalesecuritiesdebt
 * @property int unrecordedunconditionalpurchaseobligationbalanceonfirstanniversary
 * @property float definedcontributionplanemployermatchingcontributionpercent
 * @property int contractwithcustomerliabilitycurrent
 * @property int commonstocksharesissued
 * @property int variableleasecost
 * @property int allocatedsharebasedcompensationexpense
 * @property int effectiveincometaxratereconciliationtaxcutsandjobsactof2017amount
 * @property int debtinstrumentinterestratestatedpercentage
 * @property float commonstockparorstatedvaluepershare
 * @property int othercomprehensiveincomelossderivativeinstrumentgainlossafterreclassificationandtax
 * @property int fairvalueinputslevel2member
 * @property int deferredtaxassetstaxcreditcarryforwards
 * @property int operatingleaseliability
 * @property int researchanddevelopmentexpense
 * @property int availableforsalesecuritiesdebtsecurities
 * @property int europesegmentmember
 * @property string employeeservicesharebasedcompensationnonvestedawardstotalcompensationcostnotyetrecognizedperiodforrecognition1
 * @property string entityregistrantname
 * @property string liabilitiesnoncurrent
 * @property int deferredtaxliabilitiesminimumtaxonforeignearnings
 * @property int effectiveincometaxratereconciliationsharebasedcompensationexcesstaxbenefitamount
 * @property int numberofcustomerswithsignificantaccountsreceivablebalance
 * @property int lesseeoperatingleaseliabilitypaymentsdueyearthree
 * @property string sharebasedcompensationarrangementbysharebasedpaymentawardawardvestingperiod1
 * @property int operatingandfinanceleaseliability
 * @property string foreignexchangecontractmember
 * @property string documenttype
 * @property int employeeservicesharebasedcompensationtaxbenefitfromcompensationexpense
 * @property string entityaddressstateorprovince
 * @property int derivativeliabilityfairvaluegrossliabilityincludingnotsubjecttomasternettingarrangement
 * @property int equitysecuritiesfvniaccumulatedgrossunrealizedlossbeforetax
 * @property int factorbywhicheachrsugrantedreducesandeachrsucanceledorsharewithheldfortaxesincreasessharesavailableforgrant
 * @property string cashcashequivalentsandmarketablesecurities
 * @property int financeleaserightofuseasset
 * @property string commercialpapermember
 * @property int longtermdebtmaturitiesrepaymentsofprincipalafteryearfive
 * @property string marketablesecuritiesnoncurrent
 * @property string liabilities
 * @property int foreignincometaxexpensebenefitcontinuingoperations
 * @property int cashequivalentsandmarketablesecuritiesaccumulatedgrossunrealizedlossbeforetax
 * @property float shorttermdebtweightedaverageinterestrate
 * @property string sharebasedcompensationarrangementbysharebasedpaymentawardofferingperiod
 * @property object documentperiodenddate
 * @property int nontradereceivablescurrent
 * @property int equitysecuritiesfvnicurrentandnoncurrent
 * @property int operatingleaseliabilitycurrent
 * @property int proceedsfromissuanceoflongtermdebt
 * @property int unrecognizedtaxbenefitsdecreasesresultingfromsettlementswithtaxingauthorities
 * @property int noncurrentassets
 * @property string auditorlocation
 * @property int otherliabilitiesmember
 * @property int sharebasedcompensation
 * @property int japansegmentmember
 * @property int deferredtaxassetsgoodwillandintangibleassets
 * @property int otherassetsmember
 * @property int commonstocksincludingadditionalpaidincapital
 * @property int lesseeoperatingandfinanceleaseliabilitytobepaidyearthree
 * @property int lesseeoperatingleaseliabilitypaymentsduenexttwelvemonths
 * @property string amendmentflag
 * @property int otherliabilitiescurrent
 * @property int interestpaidnet
 * @property int paymentstoacquirepropertyplantandequipment
 * @property int americassegmentmember
 * @property int availableforsalesecuritiesdebtmaturitiesrollingyearsixthroughtenfairvalue
 * @property int cashandcashequivalentsatcarryingvalue
 * @property int otherassetscurrent
 * @property int unfavorableinvestigationoutcomeeustateaidrulesmember
 * @property string securityexchangename
 * @property int interestcostsincurred
 * @property float earningspersharebasic
 * @property int commonstocksharesauthorized
 * @property int increasedecreaseinaccountspayable
 * @property int retainedearningsaccumulateddeficit
 * @property int sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsnumberofsharesofcommonstockissuedperunituponvesting
 * @property int employeestockpurchaseplanmaximumannualpurchasesperemployeeamount
 * @property int hedgeaccountingadjustmentsrelatedtolongtermdebt
 * @property int deferredincometaxexpensebenefit
 * @property string operatingincomeloss
 * @property int sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsgrantsinperiod
 * @property int employeestockmember
 * @property string assetscurrent
 * @property string icfrauditorattestationflag
 * @property string netcashprovidedbyusedinfinancingactivities
 * @property int operatingleaseliabilitynoncurrent
 * @property int dividends
 * @property string entityinteractivedatacurrent
 * @property int increasedecreaseinaccountsreceivable
 * @property int fairvalueinputslevel1member
 * @property int depreciationdepletionandamortization
 * @property float debtinstrumentinterestrateeffectivepercentage
 * @property int longtermdebtcurrent
 * @property int inventorynet
 * @property int unrecordedunconditionalpurchaseobligationdueafterfiveyears
 * @property int lesseeoperatingandfinanceleaseliabilitytobepaidafteryearfive
 * @property int availableforsaledebtsecuritiesamortizedcostbasis
 * @property int othercomprehensiveincomelossreclassificationadjustmentfromaociforsaleofsecuritiesnetoftax
 * @property int othercomprehensiveincomelossderivativeinstrumentgainlossbeforereclassificationaftertax
 * @property string entityaddressaddressline1
 * @property int othercomprehensiveincomelossforeigncurrencytransactionandtranslationadjustmentnetoftax
 * @property int currentfederaltaxexpensebenefit
 * @property int deferredtaxassetsleaseliabilities
 * @property int deferredtaxassetstaxcreditcarryforwardsresearch
 * @property float sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsforfeituresweightedaveragegrantdatefairvalue
 * @property string propertyplantandequipmentusefullife
 * @property int unrecognizedtaxbenefitsincreasesresultingfrompriorperiodtaxpositions
 * @property int operatingandfinanceleaserightofuseasset
 * @property string revenuefromcontractwithcustomerexcludingassessedtax
 * @property int paymentsofdividends
 * @property int currentmarketablesecuritiesandnoncurrentmarketablesecuritiesmember
 * @property string entityvoluntaryfilers
 * @property int fourthquarter2022debtissuancemember
 * @property string entitywellknownseasonedissuer
 * @property int cash
 * @property string security12btitle
 * @property int unrecordedunconditionalpurchaseobligationbalanceonthirdanniversary
 * @property int depreciation
 * @property int cityareacode
 * @property int financeleaseliabilitycurrent
 * @property string derivativenotionalamount
 * @property int lesseeoperatingandfinanceleaseliabilitypaymentsdue
 * @property int debtinstrumentunamortizeddiscountpremiumanddebtissuancecostsnet
 * @property int financeleaseliabilityundiscountedexcessamount
 * @property int operatingleaserightofuseasset
 * @property int deferredforeignincometaxexpensebenefit
 * @property int deferredtaxassetstaxdeferredexpensereservesandaccruals
 * @property int stateandlocalincometaxexpensebenefitcontinuingoperations
 * @property int deferredstateandlocalincometaxexpensebenefit
 * @property int otherliabilitiesnoncurrent
 * @property int longtermdebtmaturitiesrepaymentsofprincipalinyearfour
 * @property int deferredtaxliabilitiesleasingarrangements
 * @property int lesseeoperatingleaseliabilitypaymentsdueyearfour
 * @property string lesseeoperatingandfinanceleasetermofcontract
 * @property int incometaxreconciliationincometaxexpensebenefitatfederalstatutoryincometaxrate
 * @property int unrecordedunconditionalpurchaseobligationbalanceonfifthanniversary
 * @property int longtermdebtmaturitiesrepaymentsofprincipalinyeartwo
 * @property int increasedecreaseininventories
 * @property string assetsnoncurrent
 * @property int sharespaidfortaxwithholdingforsharebasedcompensation
 * @property int othercomprehensiveincomelossderivativeinstrumentgainlossreclassificationaftertax
 * @property float definedcontributionplanemployermatchingcontributionpercentofmatch
 * @property int otherassetsnoncurrent
 * @property int unrecognizedtaxbenefitsincreasesresultingfromcurrentperiodtaxpositions
 * @property int longtermdebtmaturitiesrepaymentsofprincipalinnexttwelvemonths
 * @property int paymentsforrepurchaseofcommonstock
 * @property int machineryequipmentandinternalusesoftwaremember
 * @property int otheraccruedliabilitiesnoncurrent
 * @property int employeeservicesharebasedcompensationnonvestedawardstotalcompensationcostnotyetrecognized
 * @property int netincomeloss
 * @property int unrecognizedtaxbenefitsthatwouldimpacteffectivetaxrate
 * @property int decreaseinunrecognizedtaxbenefitsisreasonablypossible
 * @property int interestratecontractmember
 * @property int incometaxreconciliationforeignincometaxratedifferential
 * @property int paymentsrelatedtotaxwithholdingforsharebasedcompensation
 * @property int increasedecreaseinotheroperatingliabilities
 * @property int commercialpaper
 * @property int stockrepurchasedandretiredduringperiodshares
 * @property int unrecognizedtaxbenefitsreductionsresultingfromlapseofapplicablestatuteoflimitations
 * @property int cashcashequivalentsrestrictedcashandrestrictedcashequivalentsperiodincreasedecreaseincludingexchangerateeffect
 * @property int financeleaseliabilitypaymentsdueyearfive
 * @property int repaymentsoflongtermdebt
 * @property float sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsnonvestedweightedaveragegrantdatefairvalue
 * @property float effectiveincometaxratecontinuingoperations
 * @property string localphonenumber
 * @property int accumulateddepreciationdepletionandamortizationpropertyplantandequipment
 * @property int proceedsfromrepaymentsofcommercialpaper
 * @property int longtermdebtnoncurrent
 * @property string entityfilenumber
 * @property int leaseholdimprovementsmember
 * @property int performanceobligationsinarrangements
 * @property int financeleaseliabilitypaymentsduenexttwelvemonths
 * @property int repaymentsofshorttermdebtmaturinginmorethanthreemonths
 * @property int deferredfederalincometaxexpensebenefit
 * @property string documentannualreport
 * @property float operatingandfinanceleaseweightedaveragediscountratepercent
 * @property int availableforsalesecuritiesdebtmaturitiesrollingafteryeartenfairvalue
 * @property int restofasiapacificsegmentmember
 * @property string cashcashequivalentsandmarketablesecuritiescost
 * @property int rightofuseassetsobtainedinexchangeforoperatingandfinanceleaseliabilities
 * @property int equitysecuritiesfvniaccumulatedgrossunrealizedgainbeforetax
 * @property int entitycentralindexkey
 * @property int incometaxreconciliationotheradjustments
 * @property int netcashprovidedbyusedininvestingactivities
 * @property int operatingleasepayments
 * @property string revenueremainingperformanceobligationexpectedtimingofsatisfactionperiod1
 * @property int debtinstrumentmaturityyearrangeend
 * @property int paymentstoacquireavailableforsalesecuritiesdebt
 * @property int contractwithcustomerliabilityrevenuerecognized
 * @property int documentfiscalyearfocus
 * @property float sharebasedcompensationarrangementbysharebasedpaymentawardmaximumemployeesubscriptionrate
 * @property string entityincorporationstatecountrycode
 * @property float sharebasedcompensationarrangementbysharebasedpaymentawardpurchasepriceofcommonstockpercent
 * @property int deferredtaxassetsvaluationallowance
 * @property int creditconcentrationriskmember
 * @property string entityfilercategory
 * @property int weightedaveragenumberdilutedsharesoutstandingadjustment
 * @property int nontradereceivablemember
 * @property string entityaddresscityortown
 * @property int currenttermdebtandnoncurrenttermdebtmember
 * @property int stockissuedduringperiodsharessharebasedpaymentarrangementnetofshareswithheldfortaxes
 * @property int lesseeoperatingandfinanceleaseliabilitytobepaidyearfour
 * @property string operatingandfinanceleaseweightedaverageremainingleaseterm
 * @property int operatingexpenses
 * @property float revenueremainingperformanceobligationpercentage
 * @property int sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsaggregateintrinsicvaluenonvested
 * @property int deferredtaxassetsdeferredincome
 * @property float earningspersharediluted
 * @property float sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsgrantsinperiodweightedaveragegrantdatefairvalue
 * @property int deferredtaxassetsgross
 * @property int hedgedliabilityfairvaluehedge
 * @property int hedgedassetfairvaluehedge
 * @property int accruedincometaxesnoncurrent
 * @property int retainedearningsmember
 * @property int cashequivalentsandmarketablesecuritiesaccumulatedgrossunrealizedgainbeforetax
 * @property float concentrationriskpercentage1
 * @property int fairvalueconcentrationofriskderivativefinancialinstrumentsassets
 * @property int deferredtaxassetstaxcreditcarryforwardsforeign
 * @property string netcashprovidedbyusedinoperatingactivities
 * @property int proceedsfromshorttermdebtmaturinginmorethanthreemonths
 * @property int unrecognizedtaxbenefitsdecreasesresultingfrompriorperiodtaxpositions
 * @property int greaterchinasegmentmember
 * @property int equitysecuritiesfvnicost
 * @property int financeleaseliabilitypaymentsdue
 * @property int financeleaseliabilitypaymentsdueyeartwo
 * @property int derivativefairvalueofderivativenet
 * @property int financeleaseliabilitypaymentsdueafteryearfive
 * @property int longtermdebtmaturitiesrepaymentsofprincipalinyearthree
 * @property int derivativeassetsreductionformasternettingarrangementsincludingtheeffectsofcollateral
 * @property int othergeneralandadministrativeexpense
 * @property int longtermdebtmaturitiesrepaymentsofprincipalinyearfive
 * @property int currentfiscalyearenddate
 * @property int adjustmentsrelatedtotaxwithholdingforsharebasedcompensation
 * @property int lesseeoperatingleaseliabilitypaymentsdueyearfive
 * @property int incometaxexpensebenefit
 * @property float effectiveincometaxratereconciliationatfederalstatutoryincometaxrate
 * @property int availableforsaledebtsecuritiesaccumulatedgrossunrealizedlossbeforetax
 * @property string assets
 * @property int othercomprehensiveincomelossnetoftaxportionattributabletoparent
 * @property int sharebasedcompensationarrangementbysharebasedpaymentawardequityinstrumentsotherthanoptionsvestedinperiodtotalfairvalue
 * @property int stockholdersequity
 */
final class FinancialStatementFullAsReported extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
