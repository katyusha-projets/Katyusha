<?php

namespace FoldingMoney\Enums;

enum FinancialDataEnum {
    case BALANCE_SHEET_STATEMENT;
    case INCOME_STATEMENT;
    case REVENUE_PRODUCT_SEGMENTATION;
    case REVENUE_GEOGRAPHIC_SEGMENTATION;
    case SCORE;
    case FINANCIAL_REPORTS_DATES;
    case SHARES_FLOAT;
    case CASH_FLOW_STATEMENT;
    case INCOME_STATEMENT_AS_REPORTED;
    case BALANCE_SHEET_STATEMENT_AS_REPORTED;
    case CASH_FLOW_STATEMENT_AS_REPORTED;
    case FINANCIAL_STATEMENT_FULL_AS_REPORTED;
    case EARNING_CALL_TRANSCRIPT;
    case SEC_FILINGS;
    case RATIOS_TTM;
    case RATIOS;
    case ENTERPRISE_VALUES;
    case INCOME_STATEMENT_GROWTH;
    case BALANCE_SHEET_STATEMENT_GROWTH;
    case CASH_FLOW_STATEMENT_GROWTH;
    case KEY_METRICS_TTM;
    case KEY_METRICS;
    case FINANCIAL_GROWTH;
    case RATING;
    case HISTORICAL_RATING;
    case DISCOUNTED_CASH_FLOW;
    case HISTORICAL_DISCOUNTED_CASH_FLOW_STATEMENT;
    case HISTORICAL_DAILY_DISCOUNTED_CASH_FLOW;
    case PROFILE;
    case KEY_EXECUTIVES;
    case MARKET_CAPITALIZATION;
    case HISTORICAL_MARKET_CAPITALIZATION;
    case PRESS_RELEASES;
    case GRADE;
    case EARNINGS_SURPRISES;
    case ANALYST_ESTIMATES;
    case QUOTE;
    case QUOTE_SHORT;
    case HISTORICAL_PRICE_FULL;
}
