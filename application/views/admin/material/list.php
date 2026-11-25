
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$base_url = rtrim(base_url(), '/') . '/';
$csrf_name = $this->security->get_csrf_token_name();
$csrf_hash = $this->security->get_csrf_hash();
?>

<style>
/* =========================================================
   MATERIAL CODE PAGE
========================================================= */
.material-page {
    padding: 22px;
    min-height: calc(100vh - 70px);
    background: #F5F8FC;
    color: #334E68;
}

.material-page * {
    box-sizing: border-box;
}

.material-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 18px;
}

.material-title h3 {
    margin: 0 0 5px;
    font-size: 22px;
    font-weight: 700;
    color: #243B53;
}

.material-title p {
    margin: 0;
    font-size: 12px;
    color: #8493A5;
}

.material-toolbar {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
}

.material-btn {
    height: 37px;
    padding: 0 13px;
    border: 1px solid #DCE5EE;
    border-radius: 7px;
    background: #FFFFFF;
    color: #334E68;
    font-size: 12px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    cursor: pointer;
    transition: .2s;
}

.material-btn:hover {
    background: #F1F6FB;
    border-color: #B9CCDE;
}

.material-btn.primary {
    background: #3976AD;
    color: #FFFFFF;
    border-color: #3976AD;
}

.material-btn.primary:hover {
    background: #2F6596;
}

.material-btn.danger {
    color: #D62828;
    border-color: #F1D5D5;
}

.material-btn:disabled {
    opacity: .45;
    cursor: not-allowed;
}

.material-filter-bar {
    display: grid;
    grid-template-columns: minmax(180px, 1.2fr)
                           minmax(180px, 1fr)
                           minmax(180px, 1fr);
    gap: 15px;
    padding: 15px 18px;
    background: #FFFFFF;
    border: 1px solid #E8EEF4;
    border-radius: 10px;
    margin-bottom: 18px;
}

.material-filter-item label,
.material-field label {
    display: block;
    margin-bottom: 6px;
    font-size: 11px;
    font-weight: 600;
    color: #52677D;
}

.material-filter-item input,
.material-filter-item select {
    width: 100%;
    height: 37px;
    padding: 0 10px;
    border: 1px solid #DCE5EE;
    border-radius: 6px;
    background: #FFFFFF;
    color: #334E68;
    font-size: 12px;
    outline: none;
}

.material-filter-item input:focus,
.material-filter-item select:focus {
    border-color: #3976AD;
    box-shadow: 0 0 0 3px rgba(57,118,173,.08);
}

/* Main layout */
.material-layout {
    display: grid;
    grid-template-columns: 320px minmax(0, 1fr);
    gap: 17px;
    align-items: start;
}

.material-card {
    background: #FFFFFF;
    border: 1px solid #E5ECF3;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(30,60,90,.035);
    overflow: hidden;
}

.material-card-header {
    min-height: 55px;
    padding: 14px 17px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    border-bottom: 1px solid #EDF1F5;
}

.material-card-header h5 {
    margin: 0;
    font-size: 13px;
    font-weight: 700;
    color: #243B53;
}

.material-card-header small {
    color: #8493A5;
    font-size: 10px;
}

.material-card-header .badge {
    font-size: 10px;
    font-weight: 600;
    padding: 6px 9px;
}

.material-list-body {
    padding: 12px;
}

.material-list-summary {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    color: #8493A5;
    font-size: 10px;
}

.material-table-wrapper {
    max-height: 680px;
    overflow: auto;
}

.material-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 11px;
}

.material-table thead th {
    position: sticky;
    top: 0;
    z-index: 2;
    padding: 10px 9px;
    background: #F3F7FB;
    color: #52677D;
    text-align: left;
    font-weight: 700;
    border-bottom: 1px solid #E2E8F0;
    white-space: nowrap;
}

.material-table tbody td {
    padding: 9px;
    border-bottom: 1px solid #EDF1F5;
    color: #52677D;
    cursor: pointer;
    vertical-align: middle;
}

.material-table tbody tr:hover {
    background: #F5F8FC;
}

.material-table tbody tr.active {
    background: #EAF2F9;
}

.material-table tbody tr.active td {
    color: #28669F;
    font-weight: 700;
}

.material-table td:first-child {
    width: 105px;
    font-weight: 600;
    white-space: nowrap;
}

.material-table td:last-child {
    min-width: 130px;
}

.material-empty {
    padding: 30px 10px !important;
    text-align: center;
    color: #8493A5 !important;
    cursor: default !important;
}

.material-loading {
    padding: 30px 10px;
    text-align: center;
    color: #8493A5;
    font-size: 12px;
}

/* Detail form */
.material-detail-body {
    padding: 19px;
}

.material-section {
    min-width: 0;
    margin-bottom: 20px;
    padding: 14px;
    border: 1px solid #E5ECF3;
    border-radius: 8px;
    background: #FFFFFF;
}

.material-section:last-child {
    margin-bottom: 0;
}

.material-section-title {
    display: flex;
    align-items: center;
    gap: 8px;
    padding-bottom: 10px;
    margin-bottom: 13px;
    border-bottom: 1px solid #EDF1F5;
}

.material-section-title i {
    color: #3976AD;
    font-size: 14px;
}

.material-section-title h6 {
    margin: 0;
    color: #3976AD;
    font-size: 12px;
    font-weight: 700;
}

.material-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 13px 18px;
}

.material-field {
    min-width: 0;
}

.material-field.full {
    grid-column: 1 / -1;
}

.material-field label .required {
    color: #D62828;
}

.material-field input,
.material-field select,
.material-field textarea {
    display: block;
    width: 100%;
    min-width: 0;
    border: 1px solid #DCE5EE;
    border-radius: 6px;
    background: #FFFFFF;
    color: #334E68;
    font-size: 12px;
    padding: 8px 10px;
    outline: none;
    transition: .2s;
}

.material-field input,
.material-field select {
    height: 37px;
}

.material-field textarea {
    min-height: 65px;
    resize: vertical;
}

.material-field input:focus,
.material-field select:focus,
.material-field textarea:focus {
    border-color: #3976AD;
    box-shadow: 0 0 0 3px rgba(57,118,173,.08);
}

.material-field input[readonly] {
    background: #F3F6F9;
    color: #8493A5;
}

.material-radio-group {
    display: flex;
    align-items: center;
    gap: 20px;
    min-height: 37px;
    padding: 0 10px;
    border: 1px solid #DCE5EE;
    border-radius: 6px;
}

.material-radio {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin: 0;
    color: #52677D;
    font-size: 12px;
    cursor: pointer;
}

.material-radio input {
    width: auto;
    height: auto;
    margin: 0;
    accent-color: #3976AD;
}

.material-price-other {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 20px;
}

.material-price-other .material-section {
    margin-bottom: 0;
}

.material-field + .material-field {
    margin-top: 12px;
}

.material-detail-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
    padding: 12px 19px;
    border-top: 1px solid #EDF1F5;
    background: #FAFCFE;
}

.material-mode {
    color: #8493A5;
    font-size: 11px;
}

.material-mode strong {
    color: #3976AD;
}

.material-audit {
    color: #8493A5;
    font-size: 10px;
    line-height: 1.8;
}

@media(max-width: 1100px) {
    .material-layout {
        grid-template-columns: 280px minmax(0, 1fr);
    }
}

@media(max-width: 767px) {
    .material-page {
        padding: 14px;
    }

    .material-layout {
        grid-template-columns: 1fr;
    }

    .material-filter-bar {
        grid-template-columns: 1fr;
    }

    .material-form-grid,
    .material-price-other {
        grid-template-columns: 1fr;
    }

    .material-field.full {
        grid-column: auto;
    }

    .material-toolbar {
        width: 100%;
    }

    .material-toolbar .material-btn {
        flex: 1;
    }

    .material-table-wrapper {
        max-height: 280px;
    }
}


/* =========================================================
   MATERIAL CODE - LAYOUT REFINEMENT
   Overrides for spacing, alignment and responsive layout
========================================================= */

.material-page {
    padding: 20px;
}

.material-header {
    margin-bottom: 15px;
    gap: 12px;
}

.material-title h3 {
    font-size: 21px;
    line-height: 1.25;
}

.material-toolbar {
    gap: 6px;
}

.material-btn {
    height: 35px;
    padding: 0 11px;
    font-size: 11px;
}

/* Filter */
.material-filter-bar {
    grid-template-columns:
        minmax(180px, 1.2fr)
        minmax(180px, 1fr)
        minmax(180px, 1fr);
    gap: 13px;
    padding: 13px 15px;
    margin-bottom: 14px;
}

/* Main two-column layout */
.material-layout {
    grid-template-columns: minmax(245px, 0.30fr) minmax(0, 1fr);
    gap: 14px;
    align-items: start;
}

.material-card {
    min-width: 0;
}

.material-card-header {
    min-height: 51px;
    padding: 12px 15px;
}

.material-list-body {
    padding: 11px;
}

.material-table-wrapper {
    max-height: 620px;
}

/* Detail content */
.material-detail-body {
    padding: 14px;
}

.material-section {
    min-width: 0;
    margin-bottom: 13px;
    padding: 12px;
}

.material-section-title {
    gap: 7px;
    padding-bottom: 8px;
    margin-bottom: 11px;
}

.material-section-title h6 {
    font-size: 11px;
}

.material-form-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    column-gap: 14px;
    row-gap: 11px;
}

.material-field {
    min-width: 0;
    margin: 0 !important;
}

.material-field + .material-field {
    margin-top: 0 !important;
}

.material-field label {
    margin-bottom: 5px;
    font-size: 10px;
    line-height: 1.4;
}

.material-field input,
.material-field select {
    height: 35px;
    padding: 7px 9px;
    font-size: 11px;
}

.material-field textarea {
    min-height: 58px;
    padding: 8px 9px;
    font-size: 11px;
}

.material-price-other {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 13px;
}

.material-price-other .material-section {
    margin-bottom: 0;
}

.material-price-other .material-field + .material-field {
    margin-top: 11px !important;
}

/* Balance Control alignment */
.material-radio-group {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 22px;
    min-height: 35px;
    padding: 0 10px;
}

.material-field .material-radio {
    display: inline-flex !important;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    gap: 6px;
    margin: 0 !important;
    padding: 0;
    font-size: 10px;
    line-height: 1;
    white-space: nowrap;
    cursor: pointer;
}

.material-field .material-radio input {
    display: inline-block;
    width: 13px;
    height: 13px;
    margin: 0;
    padding: 0;
    accent-color: #3976AD;
}

/* List table */
.material-table {
    border-collapse: separate;
    border-spacing: 0;
    font-size: 10px;
}

.material-table thead th {
    padding: 9px 8px;
    font-size: 10px;
    letter-spacing: .1px;
}

.material-table tbody td {
    padding: 9px 8px;
    line-height: 1.4;
}

.material-table td:first-child {
    width: 42%;
}

.material-table tbody tr {
    transition: background .15s ease;
}

.material-table tbody tr:hover {
    background: #F2F7FC;
}

.material-table tbody tr.active {
    background: #EAF2F9;
}

/* Footer */
.material-detail-footer {
    padding: 10px 15px;
}

/* Responsive */
@media (max-width: 1100px) {
    .material-page {
        padding: 15px;
    }

    .material-layout {
        grid-template-columns: minmax(220px, 0.28fr) minmax(0, 1fr);
        gap: 11px;
    }

    .material-detail-body {
        padding: 11px;
    }

    .material-section {
        padding: 10px;
    }

    .material-form-grid {
        column-gap: 11px;
        row-gap: 10px;
    }

    .material-toolbar {
        gap: 5px;
    }

    .material-btn {
        padding: 0 9px;
    }
}

@media (max-width: 767px) {
    .material-page {
        padding: 12px;
    }

    .material-header {
        align-items: flex-start;
    }

    .material-layout {
        grid-template-columns: minmax(0, 1fr);
    }

    .material-filter-bar {
        grid-template-columns: minmax(0, 1fr);
        gap: 11px;
    }

    .material-form-grid,
    .material-price-other {
        grid-template-columns: minmax(0, 1fr);
    }

    .material-field.full {
        grid-column: auto;
    }

    .material-toolbar {
        width: 100%;
    }

    .material-toolbar .material-btn {
        flex: 1 1 auto;
    }

    .material-table-wrapper {
        max-height: 280px;
    }
}

@media print {
    .material-toolbar,
    .material-filter-bar,
    .material-list-card {
        display: none !important;
    }

    .material-page {
        padding: 0;
        background: #FFFFFF;
    }

    .material-layout {
        display: block;
    }

    .material-card {
        box-shadow: none;
        border: 0;
    }
}

</style>

<div class="material-page">

    <!-- HEADER AND TOOLBAR -->
    <div class="material-header">
        <div class="material-title">
            <h3>Material Code</h3>
            <p>Material master data management</p>
        </div>

        <div class="material-toolbar">
            <button type="button" class="material-btn" id="btnClose">
                <i class="bi bi-x-circle"></i> Close
            </button>

            <button type="button" class="material-btn" id="btnQuery">
                <i class="bi bi-search"></i> Query
            </button>

            <button type="button" class="material-btn" id="btnNew">
                <i class="bi bi-plus-lg"></i> New
            </button>

            <button type="button" class="material-btn danger"
                    id="btnDelete" disabled>
                <i class="bi bi-trash3"></i> Delete
            </button>

            <button type="button" class="material-btn primary" id="btnSave">
                <i class="bi bi-check-lg"></i> Save
            </button>

            <button type="button" class="material-btn" id="btnPrint">
                <i class="bi bi-printer"></i> Print
            </button>
        </div>
    </div>

    <!-- FILTER BAR -->
    <div class="material-filter-bar">

        <div class="material-filter-item">
            <label>Material</label>
            <input type="text" id="filterMaterial"
                   placeholder="Enter material code">
        </div>

        <div class="material-filter-item">
            <label>Material Class</label>
            <select id="filterClass1">
                <option value="">ALL</option>
            </select>
        </div>

        <div class="material-filter-item">
            <label>Using Class</label>
            <input type="text" id="filterUsingClass"
                   placeholder="ALL">
        </div>

    </div>

    <!-- MAIN CONTENT -->
    <div class="material-layout">

        <!-- MATERIAL LIST -->
        <div class="material-card">

            <div class="material-card-header">
                <h5>
                    <i class="bi bi-list-ul me-2"></i>
                    Material List
                </h5>
                <small id="materialTotal">0 items</small>
            </div>

            <div class="material-list-body">

                <div class="material-list-summary">
                    <span>Available Materials</span>
                    <span id="listCount">0 records</span>
                </div>

                <div class="material-table-wrapper">
                    <table class="material-table">
                        <thead>
                            <tr>
                                <th>Material</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody id="materialListBody">
                            <tr>
                                <td colspan="2" class="material-empty">
                                    Click Query to load materials.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- MATERIAL DETAIL -->
        <div class="material-card">

            <div class="material-card-header">
                <div>
                    <h5>Material Detail</h5>
                    <small>Material information and configuration</small>
                </div>

                <span class="badge bg-light text-primary" id="formStatus">
                    New Record
                </span>
            </div>

            <form id="materialForm" autocomplete="off">

                <div class="material-detail-body">

                    <!-- BASIC INFORMATION -->
                    <div class="material-section">

                        <div class="material-section-title">
                            <i class="bi bi-info-circle"></i>
                            <h6>Basic Information</h6>
                        </div>

                        <div class="material-form-grid">

                            <div class="material-field">
                                <label>Material Code <span class="required">*</span></label>
                                <input type="text" name="material" id="material"
                                       maxlength="12" required
                                       placeholder="Material Code">
                            </div>

                            <div class="material-field">
                                <label>Name</label>
                                <input type="text" name="material_name"
                                       id="material_name" maxlength="40">
                            </div>

                            <div class="material-field">
                                <label>Abbreviation</label>
                                <input type="text" name="material_sname"
                                       id="material_sname" maxlength="20">
                            </div>

                            <div class="material-field full">
                                <label>Remark</label>
                                <textarea name="remark" id="remark"
                                          maxlength="1000"></textarea>
                            </div>

                        </div>
                    </div>

                    <!-- CLASS -->
                    <div class="material-section">

                        <div class="material-section-title">
                            <i class="bi bi-tags"></i>
                            <h6>Class</h6>
                        </div>

                        <div class="material-form-grid">

                            <div class="material-field full">
                                <label>Material Class</label>
                                <select name="class1" id="class1">
                                    <option value="">Select Material Class</option>
                                </select>
                            </div>

                            <div class="material-field">
                                <label>Balance Control</label>
                                <div class="material-radio-group">
                                    <label class="material-radio">
                                        <input type="radio" name="balance_control"
                                               value="Y">
                                        Yes
                                    </label>
                                    <label class="material-radio">
                                        <input type="radio" name="balance_control"
                                               value="N">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="material-field">
                                <label>Import Class</label>
                                <input type="text" name="import_class"
                                       id="import_class" maxlength="1">
                            </div>

                            <div class="material-field">
                                <label>Using Class</label>
                                <input type="text" name="class2"
                                       id="class2" maxlength="10">
                            </div>

                            <div class="material-field">
                                <label>Feed Class</label>
                                <input type="text" name="class3"
                                       id="class3" maxlength="10">
                            </div>

                        </div>
                    </div>

                    <!-- SPEC -->
                    <div class="material-section">

                        <div class="material-section-title">
                            <i class="bi bi-card-text"></i>
                            <h6>Spec</h6>
                        </div>

                        <div class="material-form-grid">

                            <div class="material-field full">
                                <label>Specification</label>
                                <textarea name="mat_spec" id="mat_spec"
                                          maxlength="2000"></textarea>
                            </div>

                            <div class="material-field full">
                                <label>Size</label>
                                <textarea name="mat_size" id="mat_size"
                                          maxlength="2000"></textarea>
                            </div>

                            <div class="material-field">
                                <label>Unit</label>
                                <select name="mat_unit" id="mat_unit">
                                    <option value="">Select Unit</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- PRICE AND OTHERS -->
                    <div class="material-price-other">

                        <div class="material-section">

                            <div class="material-section-title">
                                <i class="bi bi-currency-dollar"></i>
                                <h6>Price</h6>
                            </div>

                            <div class="material-field">
                                <label>Unit Price</label>
                                <input type="number" name="unit_price"
                                       id="unit_price" step="0.001">
                            </div>

                            <div class="material-field">
                                <label>Previous U/P</label>
                                <input type="number" name="before_unit_price"
                                       id="before_unit_price" step="0.001">
                            </div>

                            <div class="material-field">
                                <label>VAT Rate (%)</label>
                                <input type="number" name="vat_rate"
                                       id="vat_rate" step="0.001">
                            </div>

                        </div>

                        <div class="material-section">

                            <div class="material-section-title">
                                <i class="bi bi-gear"></i>
                                <h6>Others</h6>
                            </div>

                            <div class="material-field">
                                <label>Delivery Day</label>
                                <input type="number" name="delivery_day"
                                       id="delivery_day" min="0" step="1">
                            </div>

                            <div class="material-field">
                                <label>Contract Group</label>
                                <input type="text" name="contract_group"
                                       id="contract_group" maxlength="10">
                            </div>

                            <div class="material-field">
                                <label>Deleted</label>
                                <input type="text" id="deleted_status"
                                       value="No" readonly>
                            </div>

                        </div>

                    </div>

                    <!-- ADDITIONAL SETTINGS -->
                    <div class="material-section">

                        <div class="material-section-title">
                            <i class="bi bi-sliders"></i>
                            <h6>Additional Settings</h6>
                        </div>

                        <div class="material-form-grid">

                            <div class="material-field">
                                <label>Optimum Quantity</label>
                                <input type="number" name="optimum_qty"
                                       id="optimum_qty" step="0.001">
                            </div>

                            <div class="material-field">
                                <label>Formula</label>
                                <input type="text" name="formula"
                                       id="formula" maxlength="12">
                            </div>

                            <div class="material-field">
                                <label>BL Allowance</label>
                                <input type="number" name="bl_allowance"
                                       id="bl_allowance" step="0.001">
                            </div>

                            <div class="material-field">
                                <label>RCV Allowance</label>
                                <input type="number" name="rcv_allowance"
                                       id="rcv_allowance" step="0.001">
                            </div>

                            <div class="material-field">
                                <label>Last In Date</label>
                                <input type="date" id="last_in_date_display">
                                <input type="hidden" name="last_in_date"
                                       id="last_in_date">
                            </div>

                            <div class="material-field">
                                <label>Spare Part</label>
                                <select name="yn_spare" id="yn_spare">
                                    <option value="">Select</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- AUDIT -->
                    <div class="material-section"
                         id="auditSection" style="display:none;">

                        <div class="material-section-title">
                            <i class="bi bi-clock-history"></i>
                            <h6>Audit Information</h6>
                        </div>

                        <div class="material-audit" id="auditInformation"></div>

                    </div>

                </div>

                <div class="material-detail-footer">
                    <div class="material-mode">
                        Current Mode: <strong id="currentMode">New Record</strong>
                    </div>

                    <div class="material-audit">
                        <span class="required">*</span> Required field
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

<script>
(function () {
    'use strict';

    const BASE_URL = <?= json_encode($base_url) ?>;
    const CSRF_NAME = <?= json_encode($csrf_name) ?>;
    let csrfHash = <?= json_encode($csrf_hash) ?>;

    const URLS = {
        list: BASE_URL + 'material/get_materials',
        detail: BASE_URL + 'material/get_material',
        dropdowns: BASE_URL + 'material/get_dropdowns',
        nextCode: BASE_URL + 'material/get_next_material_code',
        save: BASE_URL + 'material/save',
        delete: BASE_URL + 'material/delete'
    };

    const $ = function (id) {
        return document.getElementById(id);
    };

    const form = $('materialForm');
    const listBody = $('materialListBody');

    let currentMode = 'insert';
    let selectedMaterial = null;
    let materialData = [];
    let dropdowns = {
        class1: [],
        mat_unit: []
    };

    /* =====================================================
       HELPERS
    ===================================================== */

    function escapeHtml(value) {
        return String(value == null ? '' : value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function showMessage(type, message) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: type,
                text: message,
                confirmButtonColor: '#3976AD'
            });
        } else {
            alert(message);
        }
    }

    function confirmAction(title, message) {
        if (typeof Swal !== 'undefined') {
            return Swal.fire({
                icon: 'warning',
                title: title,
                text: message,
                showCancelButton: true,
                confirmButtonText: 'Yes, continue',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#D62828'
            }).then(function (result) {
                return result.isConfirmed;
            });
        }

        return Promise.resolve(confirm(message));
    }

    async function loadNextMaterialCode() {
        $('material').value = 'Generating...';

        try {
            const result = await request(URLS.nextCode);

            $('material').value = result.material;

        } catch (error) {
            $('material').value = '';

            showMessage('error', error.message);
        }
    }

    async function request(url, options) {
        const response = await fetch(url, {
            ...(options || {}),
            credentials: 'same-origin'
        });

        const responseText = await response.text();

        let result;

        try {
            result = JSON.parse(responseText);
        } catch (error) {
            console.error('Invalid JSON response:', {
                url: url,
                status: response.status,
                response: responseText
            });

            throw new Error(
                'Invalid server response. HTTP ' + response.status +
                '. Check browser console.'
            );
        }

        if (result.csrf_hash) {
            csrfHash = result.csrf_hash;
        }

        if (!response.ok || result.status === false) {
            throw new Error(result.message || 'Request failed.');
        }

        return result;
    }

    async function postRequest(url, data) {
        const formData = new FormData();

        Object.keys(data).forEach(function (key) {
            formData.append(
                key,
                data[key] == null ? '' : data[key]
            );
        });

        if (CSRF_NAME) {
            formData.append(CSRF_NAME, csrfHash);
        }

        return request(url, {
            method: 'POST',
            body: formData
        });
    }

    function setButtonLoading(button, loading) {
        if (loading) {
            button.dataset.originalHtml = button.innerHTML;
            button.disabled = true;
            button.innerHTML =
                '<i class="bi bi-arrow-repeat"></i> Processing...';
        } else {
            button.disabled = false;

            if (button.dataset.originalHtml) {
                button.innerHTML = button.dataset.originalHtml;
            }
        }
    }

    function setMode(mode) {
        currentMode = mode;

        $('currentMode').textContent =
            mode === 'insert' ? 'New Record' : 'Edit Record';

        $('formStatus').textContent =
            mode === 'insert' ? 'New Record' : 'Editing';

        $('btnDelete').disabled =
            mode === 'insert' || !selectedMaterial;

        $('material').readOnly = true;
    }

    function setSelectOptions(element, items, placeholder, selectedValue) {
        const selected = selectedValue == null
            ? ''
            : String(selectedValue);

        let html = '<option value="">' +
            escapeHtml(placeholder) +
            '</option>';

        items.forEach(function (item) {
            const value = String(item.code);
            const label = String(item.code_name || item.code);

            html += '<option value="' + escapeHtml(value) + '"' +
                (value === selected ? ' selected' : '') +
                '>' +
                escapeHtml(value + ' - ' + label) +
                '</option>';
        });

        // Preserve old inactive code when editing.
        if (
            selected !== '' &&
            !items.some(function (item) {
                return String(item.code) === selected;
            })
        ) {
            html += '<option value="' + escapeHtml(selected) +
                '" selected>' +
                escapeHtml(selected + ' - Inactive / unavailable') +
                '</option>';
        }

        element.innerHTML = html;
    }

    /* =====================================================
       DROPDOWNS
    ===================================================== */

    async function loadDropdowns() {
        const result = await request(URLS.dropdowns);

        dropdowns.class1 = result.data.class1 || [];
        dropdowns.mat_unit = result.data.mat_unit || [];

        setSelectOptions(
            $('class1'),
            dropdowns.class1,
            'Select Material Class'
        );

        setSelectOptions(
            $('filterClass1'),
            dropdowns.class1,
            'ALL'
        );

        setSelectOptions(
            $('mat_unit'),
            dropdowns.mat_unit,
            'Select Unit'
        );
    }

    /* =====================================================
       MATERIAL LIST
    ===================================================== */

    function getFilters() {
        return {
            material: $('filterMaterial').value.trim(),
            class1: $('filterClass1').value,
            class2: $('filterUsingClass').value.trim()
        };
    }

    async function loadMaterials() {
        listBody.innerHTML =
            '<tr><td colspan="2" class="material-loading">' +
            'Loading materials...</td></tr>';

        const filters = getFilters();

        const params = new URLSearchParams(filters);

        try {
            const result = await request(
                URLS.list + '?' + params.toString()
            );

            materialData = result.data || [];

            renderMaterialList(materialData);

        } catch (error) {
            listBody.innerHTML =
                '<tr><td colspan="2" class="material-empty">' +
                'Unable to load materials.</td></tr>';

            showMessage('error', error.message);
        }
    }

    function renderMaterialList(items) {
        $('materialTotal').textContent = items.length + ' items';
        $('listCount').textContent = items.length + ' records';

        if (!items.length) {
            listBody.innerHTML =
                '<tr><td colspan="2" class="material-empty">' +
                'No material found.</td></tr>';

            return;
        }

        let html = '';

        items.forEach(function (item) {
            const active =
                selectedMaterial === item.material ? 'active' : '';

            html += `
                <tr class="${active}"
                    data-material="${escapeHtml(item.material)}">
                    <td>${escapeHtml(item.material)}</td>
                    <td>${escapeHtml(item.material_name || '-')}</td>
                </tr>
            `;
        });

        listBody.innerHTML = html;
    }

    async function loadMaterialDetail(material) {
        try {
            const result = await request(
                URLS.detail + '?material=' +
                encodeURIComponent(material)
            );

            selectedMaterial = material;

            fillForm(result.data);

            setMode('update');

            renderMaterialList(materialData);

        } catch (error) {
            showMessage('error', error.message);
        }
    }

    /* =====================================================
       FORM
    ===================================================== */

    async function clearForm() {
        form.reset();

        selectedMaterial = null;

        $('auditSection').style.display = 'none';
        $('auditInformation').innerHTML = '';

        $('last_in_date').value = '';
        $('last_in_date_display').value = '';

        $('deleted_status').value = 'No';

        setSelectOptions(
            $('class1'),
            dropdowns.class1,
            'Select Material Class'
        );

        setSelectOptions(
            $('mat_unit'),
            dropdowns.mat_unit,
            'Select Unit'
        );

        setMode('insert');

        renderMaterialList(materialData);

        await loadNextMaterialCode();
    }

    function setBalanceControl(value) {
        const radios = document.querySelectorAll(
            'input[name="balance_control"]'
        );

        radios.forEach(function (radio) {
            radio.checked = radio.value === String(value || '');
        });
    }

    function getBalanceControl() {
        const selected = document.querySelector(
            'input[name="balance_control"]:checked'
        );

        return selected ? selected.value : '';
    }

    function fillForm(data) {
        form.reset();

        const fields = [
            'material',
            'material_name',
            'material_sname',
            'remark',
            'import_class',
            'class2',
            'class3',
            'mat_spec',
            'mat_size',
            'unit_price',
            'before_unit_price',
            'vat_rate',
            'delivery_day',
            'contract_group',
            'optimum_qty',
            'formula',
            'bl_allowance',
            'rcv_allowance',
            'yn_spare'
        ];

        fields.forEach(function (field) {
            if ($(field)) {
                $(field).value =
                    data[field] == null ? '' : data[field];
            }
        });

        setSelectOptions(
            $('class1'),
            dropdowns.class1,
            'Select Material Class',
            data.class1
        );

        setSelectOptions(
            $('mat_unit'),
            dropdowns.mat_unit,
            'Select Unit',
            data.mat_unit
        );

        setBalanceControl(data.balance_control);

        // Last In Date: YYYYMMDD to YYYY-MM-DD.
        const date = data.last_in_date || '';

        if (/^\d{8}$/.test(date)) {
            $('last_in_date_display').value =
                date.substring(0, 4) + '-' +
                date.substring(4, 6) + '-' +
                date.substring(6, 8);
        } else {
            $('last_in_date_display').value = '';
        }

        $('last_in_date').value = date;

        $('deleted_status').value =
            data.delete_flag === 'Y' ? 'Yes' : 'No';

        // Audit.
        const audit = [];

        if (data.reg_emp || data.reg_date) {
            audit.push(
                'Created by: ' + escapeHtml(data.reg_emp || '-') +
                ' | Date: ' + escapeHtml(data.reg_date || '-')
            );
        }

        if (data.mod_emp || data.mod_date) {
            audit.push(
                'Updated by: ' + escapeHtml(data.mod_emp || '-') +
                ' | Date: ' + escapeHtml(data.mod_date || '-')
            );
        }

        $('auditInformation').innerHTML = audit.join('<br>');
        $('auditSection').style.display =
            audit.length ? 'block' : 'none';
    }

    function getFormData() {
        const formData = new FormData(form);
        const data = {};

        formData.forEach(function (value, key) {
            data[key] = value;
        });

        data.mode = currentMode;
        data.balance_control = getBalanceControl();

        const date = $('last_in_date_display').value;

        data.last_in_date = date
            ? date.replace(/-/g, '')
            : '';

        return data;
    }

    /* =====================================================
       SAVE
    ===================================================== */

    async function saveMaterial() {
        if (!form.reportValidity()) {
            return;
        }

        const material = $('material').value.trim();

        if (!material) {
            showMessage('warning', 'Material Code is required.');
            $('material').focus();
            return;
        }

        const button = $('btnSave');

        setButtonLoading(button, true);

        try {
            const result = await postRequest(
                URLS.save,
                getFormData()
            );

            selectedMaterial = result.material;

            await loadMaterials();
            await loadMaterialDetail(result.material);

            showMessage('success', result.message);

        } catch (error) {
            showMessage('error', error.message);
        } finally {
            setButtonLoading(button, false);
        }
    }

    /* =====================================================
       DELETE
    ===================================================== */

    async function deleteMaterial() {
        if (!selectedMaterial) {
            return;
        }

        const confirmed = await confirmAction(
            'Delete Material?',
            'Material ' + selectedMaterial +
            ' will be marked as deleted.'
        );

        if (!confirmed) {
            return;
        }

        const button = $('btnDelete');

        setButtonLoading(button, true);

        try {
            const result = await postRequest(URLS.delete, {
                material: selectedMaterial
            });

            clearForm();
            await loadMaterials();

            showMessage('success', result.message);

        } catch (error) {
            showMessage('error', error.message);
        } finally {
            setButtonLoading(button, false);
        }
    }

    /* =====================================================
       EVENTS
    ===================================================== */

    $('btnQuery').addEventListener('click', loadMaterials);

    $('btnNew').addEventListener('click', clearForm);

    $('btnSave').addEventListener('click', saveMaterial);

    $('btnDelete').addEventListener('click', deleteMaterial);

    $('btnClose').addEventListener('click', function () {
        window.location.href = BASE_URL + 'dashboard';
    });

    $('btnPrint').addEventListener('click', function () {
        window.print();
    });

    listBody.addEventListener('click', function (event) {
        const row = event.target.closest('tr[data-material]');

        if (!row) {
            return;
        }

        loadMaterialDetail(row.dataset.material);
    });

    $('last_in_date_display').addEventListener('change', function () {
        $('last_in_date').value = this.value
            ? this.value.replace(/-/g, '')
            : '';
    });

    $('material').addEventListener('input', function () {
        if (currentMode === 'insert') {
            this.value = this.value.toUpperCase();
        }
    });

    // Filter input: search when Enter is pressed.
    $('filterMaterial').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            loadMaterials();
        }
    });

    $('filterUsingClass').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            loadMaterials();
        }
    });

    $('filterClass1').addEventListener('change', loadMaterials);

    /* =====================================================
       INITIALIZE
    ===================================================== */

    async function initialize() {
        try {
            await loadDropdowns();

            setMode('insert');

            await loadNextMaterialCode();

            await loadMaterials();

        } catch (error) {
            console.error(error);
            showMessage('error', error.message);
        }
    }

    initialize();

})();
</script>
