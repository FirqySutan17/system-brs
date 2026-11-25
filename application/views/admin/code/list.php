
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
/* ==========================================
   CODE MASTER
========================================== */

.code-page {
    padding: 25px;
    min-height: 100vh;
    background: #F5F8FC;
    color: #334E68;
}

.code-page * {
    box-sizing: border-box;
}

.code-page .page-heading {
    margin-bottom: 22px;
}

.code-page .page-heading h3 {
    margin: 0;
    color: #243B53;
    font-size: 22px;
    font-weight: 750;
}

.code-page .page-heading p {
    margin: 6px 0 0;
    color: #8493A5;
    font-size: 12px;
}

.code-toolbar {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 9px;
    margin-bottom: 18px;
    padding: 13px 16px;
    background: #FFFFFF;
    border: 1px solid #E7EDF4;
    border-radius: 13px;
    box-shadow: 0 3px 12px rgba(36,59,83,.025);
}

.code-toolbar .toolbar-divider {
    width: 1px;
    height: 27px;
    background: #E2E8F0;
    margin: 0 4px;
}

.code-toolbar .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 8px 13px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 650;
}

.btn-code-primary {
    color: #FFFFFF;
    background: #3976AD;
    border: 1px solid #3976AD;
}

.btn-code-primary:hover {
    color: #FFFFFF;
    background: #2F6596;
}

.btn-code-light {
    color: #52677D;
    background: #F7F9FC;
    border: 1px solid #E2E8F0;
}

.btn-code-light:hover {
    color: #3976AD;
    background: #EAF2F9;
    border-color: #D5E5F3;
}

.btn-code-danger {
    color: #D62828;
    background: #FFF5F5;
    border: 1px solid #FCE0E0;
}

.btn-code-danger:hover {
    color: #B91C1C;
    background: #FEECEC;
}

.code-layout {
    display: grid;
    grid-template-columns: 290px minmax(0, 1fr);
    gap: 18px;
    align-items: stretch;
}

.code-card {
    background: #FFFFFF;
    border: 1px solid #E7EDF4;
    border-radius: 13px;
    box-shadow: 0 3px 12px rgba(36,59,83,.025);
    overflow: hidden;
    min-width: 0;
}

.code-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding: 17px 18px;
    border-bottom: 1px solid #EDF1F5;
}

.code-card-title {
    color: #243B53;
    font-size: 13px;
    font-weight: 750;
    margin: 0;
}

.code-card-subtitle {
    color: #94A3B8;
    font-size: 10px;
    margin: 4px 0 0;
}

.code-card-body {
    padding: 16px;
}

.code-search {
    position: relative;
    margin-bottom: 13px;
}

.code-search i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94A3B8;
    font-size: 13px;
}

.code-search input {
    width: 100%;
    height: 38px;
    padding: 8px 12px 8px 35px;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    background: #FAFCFE;
    color: #334E68;
    font-size: 11px;
    outline: none;
}

.code-search input:focus,
.code-form-control:focus {
    border-color: #8CB4D8;
    box-shadow: 0 0 0 3px rgba(57,118,173,.09);
    outline: none;
}

.code-head-list {
    display: flex;
    flex-direction: column;
    gap: 5px;
    max-height: 650px;
    overflow-y: auto;
    padding-right: 3px;
}

.code-head-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    width: 100%;
    padding: 11px 12px;
    text-align: left;
    background: #FFFFFF;
    border: 1px solid transparent;
    border-radius: 9px;
    cursor: pointer;
    transition: .2s ease;
}

.code-head-item:hover {
    background: #F5F8FC;
}

.code-head-item.active {
    background: #EAF2F9;
    border-color: #D8E8F6;
}

.code-head-code {
    display: block;
    color: #3976AD;
    font-size: 11px;
    font-weight: 750;
}

.code-head-name {
    display: block;
    margin-top: 4px;
    color: #64748B;
    font-size: 10px;
    line-height: 1.4;
}

.code-head-item.active .code-head-name {
    color: #334E68;
}

.code-head-arrow {
    color: #A0ADBA;
    font-size: 12px;
}

.code-head-item.active .code-head-arrow {
    color: #3976AD;
}

.code-head-count {
    min-width: 23px;
    padding: 3px 6px;
    text-align: center;
    color: #64748B;
    background: #F1F5F9;
    border-radius: 20px;
    font-size: 9px;
    font-weight: 700;
}

.code-right-panel {
    min-width: 0;
}

.code-list-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 15px;
}

.code-selected-heading {
    color: #243B53;
    font-size: 15px;
    font-weight: 750;
    margin: 0;
}

.code-selected-caption {
    color: #94A3B8;
    font-size: 10px;
    margin-top: 4px;
}

.code-table-wrap {
    overflow-x: auto;
}

.code-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 560px;
}

.code-table th {
    padding: 12px 14px;
    color: #8493A5;
    background: #F8FAFC;
    border-bottom: 1px solid #E8EEF4;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .5px;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

.code-table td {
    padding: 12px 14px;
    color: #52677D;
    border-bottom: 1px solid #F0F3F7;
    font-size: 11px;
    vertical-align: middle;
}

.code-table tbody tr {
    cursor: pointer;
    transition: background .15s ease;
}

.code-table tbody tr:hover {
    background: #F7FAFD;
}

.code-table tbody tr.selected {
    background: #EFF6FC;
}

.code-table tbody tr:last-child td {
    border-bottom: 0;
}

.code-table .code-value {
    color: #3976AD;
    font-weight: 750;
}

.code-table .code-name {
    color: #334E68;
    font-weight: 650;
}

.code-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 9px;
    font-weight: 700;
}

.code-status.active {
    color: #25865E;
    background: #EAF7F0;
}

.code-status.inactive {
    color: #B7791F;
    background: #FFF6E8;
}

.code-status::before {
    content: "";
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: currentColor;
}

.code-empty {
    padding: 55px 20px;
    text-align: center;
    color: #94A3B8;
}

.code-empty i {
    display: block;
    margin-bottom: 12px;
    font-size: 28px;
    color: #C4D0DC;
}

.code-empty strong {
    display: block;
    margin-bottom: 5px;
    color: #52677D;
    font-size: 12px;
}

.code-empty span {
    font-size: 10px;
}

.code-loading {
    padding: 35px;
    text-align: center;
    color: #8493A5;
    font-size: 11px;
}

/* FORM */

.code-form-panel {
    display: none;
}

.code-form-panel.show {
    display: block;
}

.code-list-panel.hide {
    display: none;
}

.code-form-section {
    padding: 17px;
    background: #FFFFFF;
    border: 1px solid #E7EDF4;
    border-radius: 12px;
}

.code-form-section-title {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 17px;
    color: #243B53;
    font-size: 12px;
    font-weight: 750;
}

.code-form-section-title i {
    color: #3976AD;
    font-size: 15px;
}

.code-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 15px 18px;
}

.code-form-group {
    min-width: 0;
}

.code-form-group.full {
    grid-column: 1 / -1;
}

.code-form-label {
    display: block;
    margin-bottom: 7px;
    color: #52677D;
    font-size: 10px;
    font-weight: 700;
}

.code-form-label .required {
    color: #D62828;
}

.code-form-control {
    display: block;
    width: 100%;
    min-height: 38px;
    padding: 8px 11px;
    color: #334E68;
    background: #FAFCFE;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    font-size: 11px;
    transition: .2s ease;
}

.code-form-control:disabled,
.code-form-control[readonly] {
    color: #64748B;
    background: #F1F5F9;
    cursor: not-allowed;
}

textarea.code-form-control {
    min-height: 75px;
    resize: vertical;
}

.code-status-switch {
    display: flex;
    gap: 8px;
}

.code-status-option {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 13px;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    color: #64748B;
    background: #FFFFFF;
    font-size: 11px;
    cursor: pointer;
}

.code-status-option:has(input:checked) {
    border-color: #A9DCC5;
    background: #EFFAF4;
    color: #25865E;
}

.code-status-option input {
    accent-color: #269B70;
}

.code-form-actions {
    display: flex;
    justify-content: flex-end;
    flex-wrap: wrap;
    gap: 9px;
    margin-top: 17px;
}

.code-form-actions .btn {
    padding: 9px 16px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
}

.code-record-count {
    color: #8493A5;
    font-size: 10px;
}

@media(max-width: 1199px) {
    .code-page {
        padding: 20px;
    }

    .code-layout {
        grid-template-columns: 250px minmax(0, 1fr);
    }
}

@media(max-width: 767px) {
    .code-page {
        padding: 15px;
    }

    .code-layout {
        grid-template-columns: 1fr;
    }

    .code-head-list {
        max-height: 220px;
    }

    .code-form-grid {
        grid-template-columns: 1fr;
    }

    .code-form-group.full {
        grid-column: auto;
    }

    .code-toolbar {
        gap: 6px;
        padding: 10px;
    }

    .code-toolbar .btn {
        padding: 8px 10px;
    }
}
</style>


<div class="code-page">

    <!-- PAGE HEADING -->
    <div class="page-heading">
        <h3>Code Master</h3>
        <p>Manage general codes and their reference values</p>
    </div>


    <!-- TOOLBAR -->
    <div class="code-toolbar">

        <button type="button" class="btn btn-code-light" id="btnQuery">
            <i class="bi bi-search"></i>
            Query
        </button>

        <button type="button" class="btn btn-code-primary" id="btnNew">
            <i class="bi bi-plus-lg"></i>
            New
        </button>

        <button type="button" class="btn btn-code-danger" id="btnDelete" disabled>
            <i class="bi bi-trash3"></i>
            Delete
        </button>

        <button type="button" class="btn btn-code-light" id="btnSave" disabled>
            <i class="bi bi-floppy"></i>
            Save
        </button>

        <div class="toolbar-divider"></div>

        <span class="code-record-count" id="toolbarInfo">
            Select a General Code to get started
        </span>

    </div>


    <!-- MAIN LAYOUT -->
    <div class="code-layout">

        <!-- LEFT PANEL -->
        <div class="code-card">

            <div class="code-card-header">
                <div>
                    <h5 class="code-card-title">General Code</h5>
                    <p class="code-card-subtitle">Available code categories</p>
                </div>

                <span class="code-head-count" id="headCount">0</span>
            </div>

            <div class="code-card-body">

                <div class="code-search">
                    <i class="bi bi-search"></i>
                    <input type="text"
                           id="headSearch"
                           placeholder="Search category...">
                </div>

                <div class="code-head-list" id="headList">
                    <div class="code-loading">
                        Loading categories...
                    </div>
                </div>

            </div>
        </div>


        <!-- RIGHT PANEL -->
        <div class="code-right-panel">

            <!-- CODE LIST -->
            <div class="code-card code-list-panel" id="codeListPanel">

                <div class="code-card-header">
                    <div>
                        <h5 class="code-card-title">Code List</h5>
                        <p class="code-card-subtitle" id="selectedHeadInfo">
                            Select a category from the left panel
                        </p>
                    </div>

                    <span class="code-head-count" id="codeCount">0</span>
                </div>

                <div class="code-card-body">

                    <div class="code-list-toolbar">

                        <div class="code-search mb-0" style="width:280px;max-width:100%;">
                            <i class="bi bi-search"></i>
                            <input type="text"
                                   id="codeSearch"
                                   placeholder="Search code or name..."
                                   disabled>
                        </div>

                        <button type="button"
                                class="btn btn-code-primary btn-sm"
                                id="btnNewCode"
                                disabled>
                            <i class="bi bi-plus-lg"></i>
                            Add Code
                        </button>

                    </div>

                    <div class="code-table-wrap" id="codeTableWrap">
                        <div class="code-empty">
                            <i class="bi bi-list-ul"></i>
                            <strong>No category selected</strong>
                            <span>Select a General Code to display its codes.</span>
                        </div>
                    </div>

                </div>
            </div>


            <!-- FORM PANEL -->
            <div class="code-card code-form-panel" id="codeFormPanel">

                <div class="code-card-header">

                    <div>
                        <h5 class="code-card-title" id="formTitle">
                            New Code
                        </h5>

                        <p class="code-card-subtitle" id="formSubtitle">
                            Enter code information
                        </p>
                    </div>

                    <button type="button"
                            class="btn btn-code-light btn-sm"
                            id="btnCloseForm">
                        <i class="bi bi-arrow-left"></i>
                        Back to List
                    </button>

                </div>

                <div class="code-card-body">

                    <form id="codeForm" autocomplete="off">

                        <input type="hidden" name="mode" id="formMode">
                        <input type="hidden" name="old_head_code" id="oldHeadCode">
                        <input type="hidden" name="old_code" id="oldCode">

                        <div class="row g-3">

                            <!-- LEFT FORM COLUMN -->
                            <div class="col-lg-6">

                                <div class="code-form-section h-100">

                                    <div class="code-form-section-title">
                                        <i class="bi bi-card-text"></i>
                                        Basic Information
                                    </div>

                                    <div class="code-form-grid">

                                        <div class="code-form-group">
                                            <label class="code-form-label">
                                                Head Code <span class="required">*</span>
                                            </label>

                                            <input type="text"
                                                   class="code-form-control"
                                                   name="head_code"
                                                   id="formHeadCode"
                                                   maxlength="8"
                                                   required
                                                   readonly>
                                        </div>

                                        <div class="code-form-group">
                                            <label class="code-form-label">
                                                Code <span class="required">*</span>
                                            </label>

                                            <input type="text"
                                                   class="code-form-control"
                                                   name="code"
                                                   id="formCode"
                                                   maxlength="10"
                                                   required>
                                        </div>

                                        <div class="code-form-group full">
                                            <label class="code-form-label">
                                                Code Name <span class="required">*</span>
                                            </label>

                                            <input type="text"
                                                   class="code-form-control"
                                                   name="code_name"
                                                   id="formCodeName"
                                                   maxlength="40"
                                                   required>
                                        </div>

                                        <div class="code-form-group full">
                                            <label class="code-form-label">
                                                Usage Status
                                            </label>

                                            <div class="code-status-switch">

                                                <label class="code-status-option">
                                                    <input type="radio"
                                                           name="use_yn"
                                                           value="Y"
                                                           checked>
                                                    Active
                                                </label>

                                                <label class="code-status-option">
                                                    <input type="radio"
                                                           name="use_yn"
                                                           value="N">
                                                    Inactive
                                                </label>

                                            </div>
                                        </div>

                                        <div class="code-form-group full">
                                            <label class="code-form-label">
                                                Description 1
                                            </label>

                                            <input type="text"
                                                   class="code-form-control"
                                                   name="desc1"
                                                   maxlength="40">
                                        </div>

                                        <div class="code-form-group full">
                                            <label class="code-form-label">
                                                Description 2
                                            </label>

                                            <input type="text"
                                                   class="code-form-control"
                                                   name="desc2"
                                                   maxlength="40">
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <!-- RIGHT FORM COLUMN -->
                            <div class="col-lg-6">

                                <div class="code-form-section h-100">

                                    <div class="code-form-section-title">
                                        <i class="bi bi-card-list"></i>
                                        Additional Information
                                    </div>

                                    <div class="code-form-grid">

                                        <?php
                                        $description_fields = [
                                            'desc3' => 40,
                                            'desc4' => 200,
                                            'desc5' => 40,
                                            'desc6' => 40,
                                            'desc7' => 40,
                                            'desc8' => 40,
                                            'desc9' => 40,
                                            'desc0' => 40
                                        ];
                                        ?>

                                        <?php foreach ($description_fields as $field => $max): ?>

                                            <div class="code-form-group <?= $field === 'desc4' ? 'full' : ''; ?>">

                                                <label class="code-form-label">
                                                    Description <?= substr($field, 4); ?>
                                                </label>

                                                <?php if ($field === 'desc4'): ?>

                                                    <textarea class="code-form-control"
                                                              name="<?= $field; ?>"
                                                              maxlength="<?= $max; ?>"
                                                              rows="3"></textarea>

                                                <?php else: ?>

                                                    <input type="text"
                                                           class="code-form-control"
                                                           name="<?= $field; ?>"
                                                           maxlength="<?= $max; ?>">

                                                <?php endif; ?>

                                            </div>

                                        <?php endforeach; ?>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="code-form-actions">

                            <button type="button"
                                    class="btn btn-code-light"
                                    id="btnCancelForm">
                                Cancel
                            </button>

                            <button type="submit"
                                    class="btn btn-code-primary"
                                    id="btnSubmitForm">
                                <i class="bi bi-floppy me-1"></i>
                                Save Code
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>


<script>
(function () {
    'use strict';

    const BASE_URL = '<?= rtrim(base_url(), '/'); ?>/';

    const URLS = {
        heads: BASE_URL + 'code/get_heads',
        codes: BASE_URL + 'code/get_codes',
        detail: BASE_URL + 'code/get_detail',
        save: BASE_URL + 'code/save',
        delete: BASE_URL + 'code/delete'
    };

    const headList = document.getElementById('headList');
    const headSearch = document.getElementById('headSearch');
    const codeSearch = document.getElementById('codeSearch');

    const codeTableWrap = document.getElementById('codeTableWrap');
    const codeListPanel = document.getElementById('codeListPanel');
    const codeFormPanel = document.getElementById('codeFormPanel');

    const codeForm = document.getElementById('codeForm');

    const btnNew = document.getElementById('btnNew');
    const btnNewCode = document.getElementById('btnNewCode');
    const btnSave = document.getElementById('btnSave');
    const btnDelete = document.getElementById('btnDelete');

    let heads = [];
    let selectedHead = '';
    let selectedCode = '';
    let currentRows = [];
    let currentMode = '';
    let searchTimer = null;

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, function (char) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            }[char];
        });
    }

    async function request(url, options = {}) {
        const response = await fetch(url, options);

        let result;

        try {
            result = await response.json();
        } catch (error) {
            throw new Error('Invalid server response.');
        }

        if (!response.ok || !result.status) {
            throw new Error(result.message || 'Request failed.');
        }

        return result;
    }

    function showMessage(message, type = 'success') {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: type,
                title: type === 'success' ? 'Success' : 'Information',
                text: message,
                confirmButtonColor: '#3976AD'
            });
        } else {
            alert(message);
        }
    }

    async function confirmAction(message) {
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: message,
                showCancelButton: true,
                confirmButtonText: 'Yes, continue',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#D62828'
            });

            return result.isConfirmed;
        }

        return confirm(message);
    }

    function setToolbarState() {
        const hasHead = selectedHead !== '';

        btnNewCode.disabled = !hasHead;
        codeSearch.disabled = !hasHead;

        btnDelete.disabled = !selectedCode;
        btnSave.disabled = currentMode === '';
    }

    async function loadHeads() {
        headList.innerHTML = '<div class="code-loading">Loading categories...</div>';

        try {
            const result = await request(URLS.heads);

            heads = result.data || [];

            document.getElementById('headCount').textContent = heads.length;

            renderHeads();

            if (heads.length > 0) {
                const existing = heads.find(item => item.head_code === selectedHead);

                selectHead(existing ? selectedHead : heads[0].head_code);
            } else {
                selectedHead = '';
                showEmptyCodes();
            }

        } catch (error) {
            headList.innerHTML = `
                <div class="code-empty">
                    <i class="bi bi-exclamation-circle"></i>
                    <strong>Unable to load categories</strong>
                    <span>${escapeHtml(error.message)}</span>
                </div>
            `;
        }
    }

    function renderHeads() {
        const keyword = headSearch.value.trim().toLowerCase();

        const filtered = heads.filter(item => {
            return String(item.head_code || '').toLowerCase().includes(keyword)
                || String(item.code_name || '').toLowerCase().includes(keyword);
        });

        document.getElementById('headCount').textContent = filtered.length;

        if (!filtered.length) {
            headList.innerHTML = `
                <div class="code-empty">
                    <i class="bi bi-search"></i>
                    <strong>No categories found</strong>
                    <span>Try another search keyword.</span>
                </div>
            `;
            return;
        }

        headList.innerHTML = filtered.map(item => {
            const active = item.head_code === selectedHead;

            return `
                <button type="button"
                        class="code-head-item ${active ? 'active' : ''}"
                        data-head="${escapeHtml(item.head_code)}">

                    <span>
                        <span class="code-head-code">
                            ${escapeHtml(item.head_code)}
                        </span>

                        <span class="code-head-name">
                            ${escapeHtml(item.code_name)}
                        </span>
                    </span>

                    <i class="bi bi-chevron-right code-head-arrow"></i>

                </button>
            `;
        }).join('');

        headList.querySelectorAll('.code-head-item').forEach(button => {
            button.addEventListener('click', function () {
                selectHead(this.dataset.head);
            });
        });
    }

    async function selectHead(headCode) {
        selectedHead = headCode;
        selectedCode = '';
        currentMode = '';

        codeFormPanel.classList.remove('show');
        codeListPanel.classList.remove('hide');

        codeSearch.value = '';

        renderHeads();
        setToolbarState();

        await loadCodes();
    }

    async function loadCodes() {
        if (!selectedHead) {
            showEmptyCodes();
            return;
        }

        codeTableWrap.innerHTML = '<div class="code-loading">Loading codes...</div>';

        const params = new URLSearchParams({
            head_code: selectedHead,
            search: codeSearch.value.trim()
        });

        try {
            const result = await request(URLS.codes + '?' + params.toString());

            currentRows = result.data || [];

            document.getElementById('selectedHeadInfo').textContent =
                result.head.head_code + ' — ' + result.head.code_name;

            document.getElementById('codeCount').textContent = result.total;

            document.getElementById('toolbarInfo').textContent =
                result.total + ' code records';

            renderCodes();

        } catch (error) {
            codeTableWrap.innerHTML = `
                <div class="code-empty">
                    <i class="bi bi-exclamation-circle"></i>
                    <strong>Unable to load codes</strong>
                    <span>${escapeHtml(error.message)}</span>
                </div>
            `;
        }
    }

    function renderCodes() {
        if (!currentRows.length) {
            codeTableWrap.innerHTML = `
                <div class="code-empty">
                    <i class="bi bi-inbox"></i>
                    <strong>No code records found</strong>
                    <span>Click Add Code to create a new code.</span>
                </div>
            `;
            return;
        }

        codeTableWrap.innerHTML = `
            <table class="code-table">
                <thead>
                    <tr>
                        <th style="width:18%;">Code</th>
                        <th>Code Name</th>
                        <th>Description 1</th>
                        <th style="width:13%;">Status</th>
                    </tr>
                </thead>

                <tbody>
                    ${currentRows.map(row => {
                        const active = row.use_yn === 'Y';
                        const selected = selectedCode === row.code;

                        return `
                            <tr data-code="${escapeHtml(row.code)}"
                                class="${selected ? 'selected' : ''}">

                                <td>
                                    <span class="code-value">
                                        ${escapeHtml(row.code)}
                                    </span>
                                </td>

                                <td>
                                    <span class="code-name">
                                        ${escapeHtml(row.code_name)}
                                    </span>
                                </td>

                                <td>${escapeHtml(row.desc1 || '-')}</td>

                                <td>
                                    <span class="code-status ${active ? 'active' : 'inactive'}">
                                        ${active ? 'Active' : 'Inactive'}
                                    </span>
                                </td>

                            </tr>
                        `;
                    }).join('')}
                </tbody>
            </table>
        `;

        codeTableWrap.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('click', function () {
                openEdit(this.dataset.code);
            });
        });
    }

    function showEmptyCodes() {
        codeTableWrap.innerHTML = `
            <div class="code-empty">
                <i class="bi bi-list-ul"></i>
                <strong>No category selected</strong>
                <span>Select a General Code to display its codes.</span>
            </div>
        `;

        document.getElementById('selectedHeadInfo').textContent =
            'Select a category from the left panel';

        document.getElementById('codeCount').textContent = '0';
        document.getElementById('toolbarInfo').textContent =
            'Select a General Code to get started';
    }

    function openNew() {
        if (!selectedHead) {
            showMessage('Please select a General Code first.', 'info');
            return;
        }

        codeForm.reset();

        currentMode = 'insert';
        selectedCode = '';

        document.getElementById('formMode').value = 'insert';
        document.getElementById('oldHeadCode').value = '';
        document.getElementById('oldCode').value = '';

        document.getElementById('formHeadCode').value = selectedHead;
        document.getElementById('formCode').readOnly = false;

        document.getElementById('formTitle').textContent = 'New Code';
        document.getElementById('formSubtitle').textContent =
            'Create a new code under ' + selectedHead;

        document.getElementById('btnSubmitForm').innerHTML =
            '<i class="bi bi-floppy me-1"></i> Save Code';

        showForm();
        setToolbarState();

        document.getElementById('formCode').focus();
    }

    async function openEdit(code) {
        const params = new URLSearchParams({
            head_code: selectedHead,
            code: code
        });

        try {
            const result = await request(URLS.detail + '?' + params.toString());

            const data = result.data;

            codeForm.reset();

            currentMode = 'update';
            selectedCode = data.code;

            document.getElementById('formMode').value = 'update';

            document.getElementById('oldHeadCode').value = data.head_code;
            document.getElementById('oldCode').value = data.code;

            document.getElementById('formHeadCode').value = data.head_code;
            document.getElementById('formCode').value = data.code;
            document.getElementById('formCode').readOnly = true;

            document.getElementById('formCodeName').value = data.code_name || '';

            document.querySelectorAll('[name="use_yn"]').forEach(input => {
                input.checked = input.value === (data.use_yn || 'Y');
            });

            [
                'desc1', 'desc2', 'desc3', 'desc4',
                'desc5', 'desc6', 'desc7', 'desc8',
                'desc9', 'desc0'
            ].forEach(field => {
                const input = codeForm.elements[field];
                if (input) input.value = data[field] || '';
            });

            document.getElementById('formTitle').textContent = 'Edit Code';
            document.getElementById('formSubtitle').textContent =
                data.head_code + ' / ' + data.code;

            document.getElementById('btnSubmitForm').innerHTML =
                '<i class="bi bi-floppy me-1"></i> Update Code';

            renderCodes();
            showForm();
            setToolbarState();

        } catch (error) {
            showMessage(error.message, 'error');
        }
    }

    function showForm() {
        codeListPanel.classList.add('hide');
        codeFormPanel.classList.add('show');
    }

    function closeForm() {
        codeFormPanel.classList.remove('show');
        codeListPanel.classList.remove('hide');

        currentMode = '';
        selectedCode = '';

        setToolbarState();
        renderCodes();
    }

    async function saveCode(event) {
        event.preventDefault();

        if (!codeForm.reportValidity()) return;

        const formData = new FormData(codeForm);

        const submitButton = document.getElementById('btnSubmitForm');

        submitButton.disabled = true;
        submitButton.innerHTML =
            '<span class="spinner-border spinner-border-sm me-1"></span> Saving...';

        try {
            const result = await request(URLS.save, {
                method: 'POST',
                body: formData
            });

            showMessage(result.message);

            closeForm();
            await loadCodes();

        } catch (error) {
            showMessage(error.message, 'error');
        } finally {
            submitButton.disabled = false;

            submitButton.innerHTML = currentMode === 'update'
                ? '<i class="bi bi-floppy me-1"></i> Update Code'
                : '<i class="bi bi-floppy me-1"></i> Save Code';
        }
    }

    async function deleteCode() {
        if (!selectedCode) return;

        const confirmed = await confirmAction(
            'Delete code ' + selectedCode + ' from ' + selectedHead + '?'
        );

        if (!confirmed) return;

        const formData = new FormData();

        formData.append('head_code', selectedHead);
        formData.append('code', selectedCode);

        try {
            const result = await request(URLS.delete, {
                method: 'POST',
                body: formData
            });

            showMessage(result.message);

            selectedCode = '';

            setToolbarState();
            await loadCodes();

        } catch (error) {
            showMessage(error.message, 'error');
        }
    }

    // Events

    headSearch.addEventListener('input', renderHeads);

    codeSearch.addEventListener('input', function () {
        clearTimeout(searchTimer);

        searchTimer = setTimeout(loadCodes, 300);
    });

    btnNew.addEventListener('click', openNew);
    btnNewCode.addEventListener('click', openNew);

    btnSave.addEventListener('click', function () {
        codeForm.requestSubmit();
    });

    btnDelete.addEventListener('click', deleteCode);

    document.getElementById('btnCloseForm').addEventListener('click', closeForm);
    document.getElementById('btnCancelForm').addEventListener('click', closeForm);

    codeForm.addEventListener('submit', saveCode);

    document.getElementById('btnQuery').addEventListener('click', function () {
        loadHeads();
    });

    // Initial load
    loadHeads();

})();
</script>
