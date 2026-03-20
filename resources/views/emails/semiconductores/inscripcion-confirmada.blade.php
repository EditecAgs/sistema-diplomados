<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de solicitud</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #f4f0f1; font-family: Arial, sans-serif; padding: 32px 16px; }
    .wrapper { max-width: 600px; margin: 0 auto; }

    .header {
      background: #611232;
      border-radius: 12px 12px 0 0;
      padding: 32px 40px;
      text-align: center;
    }
    .header-badge {
      display: inline-block;
      font-size: 10px; font-weight: 700; letter-spacing: 2px;
      text-transform: uppercase; color: rgba(240,160,184,0.9);
      border: 1px solid rgba(240,160,184,0.3);
      border-radius: 20px; padding: 4px 14px; margin-bottom: 16px;
      background: rgba(240,160,184,0.08);
    }
    .header h1 {
      font-size: 22px; font-weight: 700; color: #ffffff;
      line-height: 1.3; margin-bottom: 6px;
    }
    .header p {
      font-size: 13px; color: rgba(255,255,255,0.5);
    }

    .body {
      background: #ffffff;
      padding: 40px;
      border-left: 1px solid #e5dde0;
      border-right: 1px solid #e5dde0;
    }

    .greeting {
      font-size: 16px; font-weight: 700; color: #1a0510;
      margin-bottom: 12px;
    }
    .intro {
      font-size: 14px; color: #4b2535; line-height: 1.7;
      margin-bottom: 24px;
    }

    .alert-box {
      background: #fdf7f9;
      border-left: 4px solid #611232;
      border-radius: 0 8px 8px 0;
      padding: 16px 20px;
      margin-bottom: 24px;
    }
    .alert-box p {
      font-size: 13.5px; color: #4b2535; line-height: 1.7;
    }

    .steps-title {
      font-size: 11px; font-weight: 700; letter-spacing: 1.5px;
      text-transform: uppercase; color: #611232;
      margin-bottom: 14px;
    }
    .steps { margin-bottom: 28px; }
    .step {
      display: flex; align-items: flex-start; gap: 12px;
      margin-bottom: 12px;
    }
    .step-num {
      width: 24px; height: 24px;
      background: #611232; color: #fff;
      font-size: 11px; font-weight: 700;
      display: flex; align-items: center; justify-content: center;
      padding: 5px;
    }
    .step p { font-size: 13.5px; color: #4b2535; line-height: 1.5; }

    .data-box {
      background: #f9f4f6;
      border: 1px solid #e5d5da;
      border-radius: 10px;
      padding: 20px 24px;
      margin-bottom: 28px;
    }
    .data-title {
      font-size: 11px; font-weight: 700; letter-spacing: 1.5px;
      text-transform: uppercase; color: #611232; margin-bottom: 14px;
    }
    .data-row {
      display: flex; justify-content: space-between;
      padding: 7px 0;
      border-bottom: 1px solid #ecdde2;
      font-size: 13px;
    }
    .data-row:last-child { border-bottom: none; }
    .data-label { color: #8b5060; font-weight: 600; }
    .data-value { color: #1a0510; text-align: right; }

    .closing {
      font-size: 13.5px; color: #4b2535; line-height: 1.7;
      margin-bottom: 24px;
    }

    .contact-box {
      background: #611232;
      border-radius: 10px;
      padding: 20px 24px;
      margin-bottom: 8px;
    }
    .contact-title {
      font-size: 11px; font-weight: 700; letter-spacing: 1.5px;
      text-transform: uppercase; color: rgba(240,160,184,0.7);
      margin-bottom: 12px;
    }
    .contact-item {
      display: flex; align-items: center; gap: 10px;
      margin-bottom: 8px;
    }
    .contact-item:last-child { margin-bottom: 0; }
    .contact-dot {
      width: 6px; height: 6px; border-radius: 50%;
      background: rgba(240,160,184,0.5); flex-shrink: 0;
    }
    .contact-item p { font-size: 13px; color: rgba(255,255,255,0.6); }
    .contact-item a { color: #f0a0b8; text-decoration: none; }

    .footer {
      background: #1a0510;
      border-radius: 0 0 12px 12px;
      padding: 20px 40px;
      text-align: center;
    }
    .footer p {
      font-size: 11px; color: rgba(255,255,255,0.6);
      line-height: 1.6;
    }
    .footer span { color: rgba(240,160,184,0.4); }
  </style>
</head>
<body>
  <div class="wrapper">

    {{-- Header --}}
    <div class="header">
      <div class="header-badge">Diplomado en Diseño de Circuitos Integrados de Aplicación Específica · TecNM 2026</div>
      <h1>Solicitud de inscripción<br>recibida</h1>
      <p>Instituto Tecnológico de Aguascalientes</p>
    </div>

    {{-- Body --}}
    <div class="body">

      <p class="greeting">
        Estimado/a {{ $inscription->first_name }} {{ $inscription->last_name }},
      </p>

      <p class="intro">
        Hemos recibido correctamente tu solicitud de inscripción para el
        <strong>Diplomado en Diseño de Circuitos Integrados de Aplicación Específica (ASICs):
        del concepto al tapeout</strong>, ofrecido por el Tecnológico Nacional de México
        a través del Instituto Tecnológico de Aguascalientes.
      </p>

      <div class="alert-box">
        <p>
          Tus datos y documentos han sido registrados en nuestro sistema.
          A continuación, el equipo académico procederá a revisar tu perfil
          para verificar que cumples con los requisitos de admisión establecidos
          en la convocatoria.
        </p>
      </div>

      <div class="steps">
        <p class="steps-title">¿Qué sigue?</p>

        <div class="step">
          <div class="step-num">1</div>
          <p>Tu solicitud será revisada por el comité académico del diplomado.</p>
        </div>
        <div class="step">
          <div class="step-num">2</div>
          <p>Se verificará que tu perfil y documentación cumplen con los requisitos de admisión.</p>
        </div>
        <div class="step">
          <div class="step-num">3</div>
          <p>
            En caso de ser aceptado/a, recibirás un correo de confirmación con
            los detalles de acceso a la plataforma y el calendario de actividades.
          </p>
        </div>
        <div class="step">
          <div class="step-num">4</div>
          <p>
            Si tu solicitud no es aprobada, también te notificaremos indicando
            el motivo.
          </p>
        </div>
      </div>

      {{-- Datos del solicitante --}}
      <div class="data-box">
        <p class="data-title">Datos de tu solicitud</p>
        <div class="data-row">
          <span class="data-label">Nombre&nbsp;</span>
          <span class="data-value"> {{ $inscription->first_name }} {{ $inscription->last_name }}</span>
        </div>
        <div class="data-row">
          <span class="data-label">RFC&nbsp;</span>
          <span class="data-value">{{ $inscription->rfc }}</span>
        </div>
        <div class="data-row">
          <span class="data-label">Correo&nbsp;</span>
          <span class="data-value">{{ $inscription->email }}</span>
        </div>
        <div class="data-row">
          <span class="data-label">Institución&nbsp;</span>
          <span class="data-value">{{ $inscription->institution }}</span>
        </div>
        <div class="data-row">
          <span class="data-label">Función laboral&nbsp;</span>
          <span class="data-value">{{ ucfirst($inscription->job_function) }}</span>
        </div>
        <div class="data-row">
          <span class="data-label">Fecha de solicitud&nbsp;</span>
          <span class="data-value">{{ $inscription->created_at->format('d \d\e F \d\e Y') }}</span>
        </div>
      </div>

      <p class="closing">
        Si tienes alguna duda o necesitas más información, no dudes en
        contactarnos a través de los medios que aparecen a continuación.
        Con gusto te atenderemos.
      </p>

      {{-- Contacto --}}
      <div class="contact-box">
        <p class="contact-title">Contacto</p>
        <div class="contact-item">
          <p>- Correo: <a href="mailto:prueba@mail.com">prueba@mail.com</a></p>
        </div>
        <div class="contact-item">
          <p style="color: rgba(255,255,255,0.6);">- Instituto Tecnológico de Aguascalientes</p>
        </div>
        <div class="contact-item">
          <p style="color: rgba(255,255,255,0.6);">- Aguascalientes, México · TecNM 2026</p>
        </div>
      </div>

    </div>

    {{-- Footer --}}
    <div class="footer">
      <p>
        Este correo fue generado automáticamente, por favor no respondas a este mensaje.<br>
      </p>
    </div>

  </div>
</body>
</html>