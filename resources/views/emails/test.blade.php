<!-- resources/views/emails/patient_registered.blade.php -->
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Patient Registered</title>
  <style>
    /* basic resets for email */
    body { margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
    table { border-spacing:0; }
    img { border:0; display:block; }
    a { color: inherit; text-decoration: none; }
    /* responsive */
    @media only screen and (max-width:600px) {
      .container { width:100% !important; }
      .stack { display:block !important; width:100% !important; }
      .align-center { text-align:center !important; }
      .p-sm { padding:16px !important; }
    }
  </style>
</head>
<body style="background-color:#f3f6fb; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">

  <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center" style="padding:30px 16px;">
        <!-- container -->
        <table class="container" width="600" cellpadding="0" cellspacing="0" role="presentation" style="width:600px; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 8px 30px rgba(18,38,63,0.08);">
          <!-- header -->
          <tr>
            <td style="background:linear-gradient(90deg,#0ea5e9, #3b82f6); padding:28px 32px;">
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="vertical-align:middle;">
                    <h1 style="margin:0; font-size:20px; color:#ffffff; font-weight:700; letter-spacing:0.2px;">Hospital Management System</h1>
                    <p style="margin:4px 0 0 0; color:rgba(255,255,255,0.9); font-size:13px;">Patient Registration Confirmation</p>
                  </td>
                  <td style="vertical-align:middle; text-align:right;">
                    <!-- small logo placeholder -->
                    <img src="https://ui-avatars.com/api/?name=HMS&background=ffffff&color=3b82f6" width="48" height="48" alt="HMS Logo" style="border-radius:8px;">
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- body -->
          <tr>
            <td class="p-sm" style="padding:28px 32px;">
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                  <td style="font-size:15px; color:#0b1220;">
                    <p style="margin:0 0 14px 0;">Hello <strong>{{ $patient->firstname }} {{ $patient->middlename ? strtoupper(substr($patient->middlename,0,1)).'. ' : '' }}{{ $patient->lastname }}</strong>,</p>

                    <p style="margin:0 0 14px 0; color:#374151;">
                      We’re pleased to confirm that you have been successfully registered in our system.
                    </p>
                  </td>
                </tr>

                <!-- details card -->
                <tr>
                  <td style="padding:12px 0;">
                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background:#f8fafc; border:1px solid #e6eef8; border-radius:8px;">
                      <tr>
                        <td style="padding:16px;">
                          <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                              <td style="vertical-align:top; font-size:13px; color:#334155; width:50%; padding-bottom:8px;">
                                <strong>Patient Code</strong><br>
                                <span style="color:#0b1220;">{{ $patient->patientcode ?? '—' }}</span>
                              </td>
                              <td style="vertical-align:top; font-size:13px; color:#334155; width:50%; padding-bottom:8px;">
                                <strong>Registered On</strong><br>
                                <span style="color:#0b1220;">{{ \Carbon\Carbon::parse($patient->created_at ?? now())->format('F d, Y H:i') }}</span>
                              </td>
                            </tr>

                            <tr>
                              <td style="vertical-align:top; font-size:13px; color:#334155; padding-top:8px;">
                                <strong>Birthdate</strong><br>
                                <span style="color:#0b1220;">{{ \Carbon\Carbon::parse($patient->birthdate)->format('F d, Y') }}</span>
                              </td>
                              <td style="vertical-align:top; font-size:13px; color:#334155; padding-top:8px;">
                                <strong>Blood Type</strong><br>
                                <span style="color:#0b1220;">{{ $patient->bloodtype ?? '—' }}</span>
                              </td>
                            </tr>

                            <tr>
                              <td colspan="2" style="padding-top:12px; font-size:13px; color:#334155;">
                                <strong>Contact</strong><br>
                                <span style="color:#0b1220;">{{ $patient->contactnumber ?? '—' }} • {{ $patient->email ?? '—' }}</span>
                              </td>
                            </tr>

                            <tr>
                              <td colspan="2" style="padding-top:12px; font-size:13px; color:#334155;">
                                <strong>Address</strong><br>
                                <span style="color:#0b1220;">{{ $patient->address ?? '—' }}</span>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <!-- CTA -->
                <tr>
                  <td style="padding-top:14px;">
                    <a href="{{ $portalUrl ?? '#' }}" style="display:inline-block; background:#2563eb; color:#ffffff; padding:10px 18px; border-radius:8px; font-weight:600; font-size:14px;">View Your Record</a>
                  </td>
                </tr>

                <!-- note -->
                <tr>
                  <td style="padding-top:18px; font-size:13px; color:#475569;">
                    <p style="margin:0 0 8px 0;">
                      If any of the above details are incorrect, please contact our reception at <a href="tel:{{ $hospitalPhone ?? '' }}" style="color:#2563eb;">{{ $hospitalPhone ?? 'N/A' }}</a> or reply to this email.
                    </p>
                    <p style="margin:0; color:#6b7280; font-size:12px;">
                      This is an automated confirmation — please keep it for your records.
                    </p>
                  </td>
                </tr>

              </table>
            </td>
          </tr>

          <!-- footer -->
          <tr>
            <td style="background:#fafafa; padding:18px 32px; text-align:center; font-size:12px; color:#6b7280;">
              <div style="margin-bottom:8px;">&copy; {{ now()->year }} {{ $hospitalName ?? 'Your Hospital Name' }}. All rights reserved.</div>
              <div>If you did not register or believe this is an error, contact us immediately at <a href="mailto:{{ $supportEmail ?? 'support@example.com' }}" style="color:#2563eb;">{{ $supportEmail ?? 'support@example.com' }}</a></div>
            </td>
          </tr>
        </table>
        <!-- /container -->
      </td>
    </tr>
  </table>

</body>
</html>
