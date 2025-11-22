

// Creta Testimonial Showcase plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const creative_design_agency_button = document.getElementById('install-activate-button');

    if (!creative_design_agency_button) return;

    creative_design_agency_button.addEventListener('click', function (e) {
        e.preventDefault();

        const creative_design_agency_redirectUrl = creative_design_agency_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const creative_design_agency_checkData = new FormData();
        creative_design_agency_checkData.append('action', 'check_creta_testimonial_activation');

        fetch(installcretatestimonialData.ajaxurl, {
            method: 'POST',
            body: creative_design_agency_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = creative_design_agency_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                creative_design_agency_button.textContent = 'Nevigate Getstart';

                const creative_design_agency_installData = new FormData();
                creative_design_agency_installData.append('action', 'install_and_activate_creta_testimonial_plugin');
                creative_design_agency_installData.append('_ajax_nonce', installcretatestimonialData.nonce);

                fetch(installcretatestimonialData.ajaxurl, {
                    method: 'POST',
                    body: creative_design_agency_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = creative_design_agency_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        creative_design_agency_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    creative_design_agency_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
