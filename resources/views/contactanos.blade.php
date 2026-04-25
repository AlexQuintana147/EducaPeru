@extends('layouts.app')

@section('title', 'Contáctanos - EducaPerú')

@section('content')
<style>
    .pg { background: #09090b; min-height: 100vh; }

    .contact-hero {
        background: radial-gradient(ellipse 80% 50% at 50% -10%, rgba(99,102,241,0.18) 0%, transparent 70%), #09090b;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .contact-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 40px;
    }
    .contact-card blockquote {
        border-left: 3px solid #6366f1;
        padding-left: 20px;
        margin-top: 28px;
    }

    .info-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 24px;
        transition: border-color .25s ease, transform .25s ease;
    }
    /* .info-card:hover { border-color: rgba(99,102,241,0.3); transform: translateY(-3px); } */
    .info-icon {
        width: 40px; height: 40px; border-radius: 10px;
        background: rgba(99,102,241,0.12);
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 14px;
    }
    .info-title { font-size: 14px; font-weight: 800; color: #f1f5f9; margin-bottom: 6px; }
    .info-desc  { font-size: 13px; color: #71717a; line-height: 1.65; }

    .form-control {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 10px;
        padding: 15px;
        font-size: 14px;
        color: #f1f5f9;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 2px rgba(99,102,241,0.2);
        outline: none;
    }
    .form-control::placeholder {
        color: #71717a;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        border-radius: 12px;
        padding: 13px 28px;
        font-size: 14px;
        font-weight: 800;
        color: #fff;
        box-shadow: 0 4px 20px rgba(99,102,241,.4);
        transition: box-shadow .25s, transform .25s;
    }
    .btn-primary:hover {
        box-shadow: 0 8px 28px rgba(99,102,241,.6);
        transform: translateY(-2px);
    }

    .section-label {
        font-size: 11px; font-weight: 800;
        letter-spacing: .18em; text-transform: uppercase;
        color: #6366f1; margin-bottom: 12px;
        display: flex; align-items: center; gap: 10px;
    }
    .section-label::before {
        content: ''; display: block;
        width: 28px; height: 2px;
        background: #6366f1; border-radius: 2px; flex-shrink: 0;
    }
    .section-title {
        font-size: clamp(26px, 4vw, 40px); font-weight: 900;
        color: #f1f5f9; line-height: 1.15; letter-spacing: -.5px;
    }

    .sec-divider { border: none; border-top: 1px solid rgba(255,255,255,0.05); margin: 0; }

    label {
        color: #f1f5f9;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }
</style>

<div class="pg">

    {{-- HERO --}}
    <section class="contact-hero py-20 sm:py-28 px-4 sm:px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 style="font-size:clamp(36px,6vw,64px);font-weight:900;color:#fff;line-height:1.1;letter-spacing:-1.5px;margin-top:8px;">
                Contáctanos
            </h1>
            <p class="text-zinc-500 mt-6 text-base sm:text-lg leading-relaxed max-w-xl mx-auto">
                Estamos aquí para ayudarte. Ponte en contacto con nosotros.
            </p>
        </div>
    </section>

    {{-- INFORMACIÓN DE CONTACTO --}}
    <section class="py-16 sm:py-20 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <div class="section-label">Información de Contacto</div>
            <h2 class="section-title mb-10">¿Cómo contactarnos?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div class="info-card">
                    <div class="info-icon">📍</div>
                    <div class="info-title">Dirección</div>
                    <div class="info-desc">Lima, Perú</div>
                </div>
                <div class="info-card">
                    <div class="info-icon">📧</div>
                    <div class="info-title">Email</div>
                    <div class="info-desc">contacto@educaperu.com</div>
                </div>
                <div class="info-card">
                    <div class="info-icon">📞</div>
                    <div class="info-title">Teléfono</div>
                    <div class="info-desc">+51 123 456 789</div>
                </div>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    {{-- FORMULARIO DE CONTACTO --}}
    <section class="py-16 sm:py-20 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <div class="section-label">Envíanos un Mensaje</div>
            <h2 class="section-title mb-10">¿Tienes alguna pregunta?</h2>
            <div class="contact-card">
                <p style="font-size:14.5px;color:#a1a1aa;line-height:1.85;margin-bottom:16px;">
                    Si tienes alguna duda sobre nuestros programas de capacitación, necesitas información adicional o quieres saber más sobre nuestras especializaciones, no dudes en contactarnos.
                </p>
                <blockquote>
                    <p style="font-size:16px;font-weight:700;font-style:italic;color:#f1f5f9;line-height:1.5;">
                        "Tu consulta es importante para nosotros."
                    </p>
                </blockquote>
                <form class="mt-8">
                    <div class="grid sm:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name">Nombre Completo</label>
                            <input type="text" class="form-control w-full" id="name" placeholder="Tu nombre completo" required>
                        </div>
                        <div>
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control w-full" id="email" placeholder="tu@email.com" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="subject">Asunto</label>
                        <input type="text" class="form-control w-full" id="subject" placeholder="Asunto del mensaje" required>
                    </div>
                    <div class="mb-8">
                        <label for="message">Mensaje</label>
                        <textarea class="form-control w-full" id="message" rows="6" placeholder="Escribe tu mensaje aquí..." required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn-primary">
                            Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
@endsection
