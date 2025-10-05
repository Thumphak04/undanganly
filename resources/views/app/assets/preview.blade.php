    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="preview-header p-3 bg-light d-flex justify-content-between align-items-center">
                        <h6 id="previewTitle" class="modal-title fw-semibold mb-0"></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="iframe-container">
                        <iframe id="previewFrame" src="" frameborder="0" width="100%"></iframe>
                    </div>
                </div>
                <div class="modal-footer flex-column align-items-stretch border-0 p-3">
                    <!-- Details Container (starts hidden, controlled by JS) -->
                      <div class="d-flex w-100 justify-content-end">
                        <a href="#" id="orderFromModal" class="btn btn-primary order-btn">
                            <i class="bi bi-whatsapp me-2"></i>Beli
                        </a>
                    </div>
                    <div id="templateDetailsContainer" class="w-100 mb-3" style="display: none;">
                        <h6 class="fw-bold border-bottom pb-2 mb-2">Detail Template</h6>
                           <!-- Action Buttons -->
                  
                        <div class="card card-body bg-light" id="templateDetailsContent" style="max-height: 200px; overflow-y: auto;">
                            <!-- Details will be injected here by JavaScript -->
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>