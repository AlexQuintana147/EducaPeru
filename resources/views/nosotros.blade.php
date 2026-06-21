@extends('layouts.app')

@section('title', 'Nosotros - EducaPerú')

@section('content')
<style>
    .pg { background: rgba(20, 18, 11); min-height: 100vh; }

    .about-hero {
        background: radial-gradient(ellipse 80% 50% at 50% -10%, rgba(99,102,241,0.18) 0%, transparent 70%), rgba(20, 18, 11);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .about-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 40px;
    }
    .about-card blockquote {
        border-left: 3px solid #6366f1;
        padding-left: 20px;
        margin-top: 28px;
    }

    .mv-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 20px;
        padding: 36px 32px;
        transition: border-color .25s ease, transform .25s ease;
    }
    .mv-card:hover { border-color: rgba(99,102,241,0.3); transform: translateY(-3px); }
    .mv-icon {
        width: 44px; height: 44px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 18px;
    }
    .mv-title { font-size: 18px; font-weight: 800; color: #f1f5f9; margin-bottom: 12px; }
    .mv-text  { font-size: 14px; color: #71717a; line-height: 1.75; }

    .value-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 24px;
        transition: border-color .25s ease, transform .25s ease;
    }
    .value-card:hover { border-color: rgba(99,102,241,0.3); transform: translateY(-3px); }
    .value-icon {
        width: 40px; height: 40px; border-radius: 10px;
        background: rgba(99,102,241,0.12);
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 14px;
    }
    .value-title { font-size: 14px; font-weight: 800; color: #f1f5f9; margin-bottom: 6px; }
    .value-desc  { font-size: 13px; color: #71717a; line-height: 1.65; }

    .audience-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 24px 28px;
        transition: border-color .25s ease;
    }
    .audience-card:hover { border-color: rgba(99,102,241,0.3); }
    .audience-title { font-size: 15px; font-weight: 800; color: #f1f5f9; margin-bottom: 6px; }
    .audience-desc  { font-size: 13px; color: #71717a; line-height: 1.6; }

    .why-card {
        background: rgba(99,102,241,0.06);
        border: 1px solid rgba(99,102,241,0.15);
        border-radius: 16px;
        padding: 24px;
        transition: border-color .25s ease, background .25s ease;
    }
    .why-card:hover { border-color: rgba(99,102,241,0.4); background: rgba(99,102,241,0.1); }
    .why-title { font-size: 14px; font-weight: 800; color: #f1f5f9; margin-bottom: 6px; }
    .why-desc  { font-size: 13px; color: #a1a1aa; line-height: 1.6; }

    .cta-section {
        background: radial-gradient(ellipse 60% 80% at 50% 100%, rgba(99,102,241,.1) 0%, transparent 70%), rgba(20, 18, 11);
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .cta-box {
        border: 1px solid rgba(99,102,241,.18);
        border-radius: 24px;
        background: rgba(99,102,241,.05);
        padding: 56px 40px;
        text-align: center;
    }
    .btn-cta-primary {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 13px 28px; border-radius: 12px;
        font-size: 14px; font-weight: 800;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff; text-decoration: none;
        box-shadow: 0 4px 20px rgba(99,102,241,.4);
        transition: box-shadow .25s, transform .25s;
    }
    .btn-cta-primary:hover { box-shadow: 0 8px 28px rgba(99,102,241,.6); transform: translateY(-2px); }

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
</style>

<div class="pg">

    {{-- HERO --}}
    <section class="about-hero py-20 sm:py-28 px-4 sm:px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 style="font-size:clamp(36px,6vw,64px);font-weight:900;color:#fff;line-height:1.1;letter-spacing:-1.5px;margin-top:8px;">
                Formamos <span style="color:#6366f1;">desarrolladores</span><br>
                <span style="-webkit-text-stroke:1px rgba(255,255,255,0.5);color:transparent;">
                    para el mundo digital
                </span>
            </h1>
            <p class="text-zinc-500 mt-6 text-base sm:text-lg leading-relaxed max-w-xl mx-auto">
                Plataforma de capacitaciones enfocada en enseñar programación de forma práctica, accesible y alineada al mercado laboral.
            </p>
        </div>
    </section>

    {{-- QUIÉNES SOMOS --}}
    <section class="py-16 sm:py-20 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="section-title mb-10">¿Quiénes somos?</h2>
            <div>
                <p style="font-size:14.5px;color:#a1a1aa;line-height:1.85;margin-bottom:16px;">
                    En el <span style="color:#f1f5f9;font-weight:700;">Centro de Capacitación y Consultoría Empresarial EDUCA PERÚ S.A.C.</span> – RUC <span style="color:#f1f5f9;font-weight:700;">20615550117</span>, asumimos el compromiso de contribuir activamente al desarrollo profesional de quienes buscan crecer, innovar y destacar en un entorno cada vez más competitivo y dinámico.
                </p>
                <p style="font-size:14.5px;color:#a1a1aa;line-height:1.85;margin-bottom:16px;">
                    El lanzamiento de nuestros Programas de Especialización responde a la necesidad de ofrecer una formación actualizada, práctica y alineada con las exigencias reales del mercado laboral. Creemos firmemente que la educación continua es el pilar fundamental para fortalecer competencias, potenciar el talento y generar nuevas oportunidades.
                </p>
                <p style="font-size:14.5px;color:#a1a1aa;line-height:1.85;margin-bottom:16px;">
                    Nuestro enfoque combina excelencia académica, innovación metodológica y acompañamiento permanente, garantizando una experiencia formativa que trascienda lo teórico y se traduzca en resultados concretos.
                </p>
                <p style="font-size:14.5px;color:#a1a1aa;line-height:1.85;">
                    Invitamos a cada participante a asumir este desafío con compromiso y visión de futuro. En EDUCA PERÚ, trabajamos para que cada paso en su formación represente un avance sólido en su desarrollo profesional.
                </p>
                <blockquote>
                    <p style="font-size:16px;font-weight:700;font-style:italic;color:#f1f5f9;line-height:1.5;">
                        "La preparación de hoy es el éxito de mañana."
                    </p>
                </blockquote>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    {{-- MISIÓN & VISIÓN --}}
    <section class="py-16 sm:py-20 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="section-title mb-10">Misión y Visión</h2>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <div class="mv-title">Nuestra Misión</div>
                    <div class="mv-text">Brindar programas de capacitación, especialización y consultoría empresarial con altos estándares de calidad académica, orientados al desarrollo de competencias estratégicas, la actualización profesional continua y la aplicación práctica del conocimiento, contribuyendo al fortalecimiento del desempeño laboral y al crecimiento sostenible de las organizaciones.</div>
                </div>
                <div>
                    <div class="mv-title">Nuestra Visión</div>
                    <div class="mv-text">Consolidarnos como una institución referente a nivel nacional en formación especializada y consultoría empresarial, reconocida por su excelencia académica, innovación metodológica y compromiso permanente con el desarrollo profesional y la mejora continua.</div>
                </div>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    {{-- VALORES --}}
    <section class="py-16 sm:py-20 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="section-title mb-10">Valores Institucionales</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <div class="value-title">Excelencia Académica</div>
                    <div class="value-desc">Promovemos altos estándares de calidad en nuestros programas formativos, garantizando contenidos actualizados y pertinentes.</div>
                </div>
                <div>
                    <div class="value-title">Responsabilidad</div>
                    <div class="value-desc">Actuamos con compromiso, seriedad y cumplimiento en cada uno de nuestros procesos académicos y administrativos.</div>
                </div>
                <div>
                    <div class="value-title">Ética Profesional</div>
                    <div class="value-desc">Desarrollamos nuestras actividades con transparencia, integridad y respeto hacia todos nuestros estudiantes y colaboradores.</div>
                </div>
                <div>
                   <div class="value-title">Innovación</div>
                    <div class="value-desc">Impulsamos metodologías modernas y el uso de herramientas tecnológicas que aporten valor real al aprendizaje.</div>
                </div>
                <div>
                    <div class="value-title">Vocación de Servicio</div>
                    <div class="value-desc">Brindamos acompañamiento y atención oportuna, priorizando las necesidades de nuestra comunidad académica.</div>
                </div>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    {{-- A QUIÉN VA DIRIGIDO --}}
    <section class="py-16 sm:py-20 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="section-title mb-10">¿A quién va dirigido?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <div class="audience-title">Estudiantes</div>
                    <div class="audience-desc">Que buscan complementar su formación universitaria con habilidades técnicas reales y demandadas.</div>
                </div>
                <div>
                    <div class="audience-title">Personas que inician</div>
                    <div class="audience-desc">Que desean aprender programación desde cero, con una base sólida y acompañamiento constante.</div>
                </div>
                <div>
                    <div class="audience-title">Profesionales</div>
                    <div class="audience-desc">Que quieren mejorar su perfil tecnológico y acceder a mejores oportunidades laborales.</div>
                </div>
            </div>
        </div>
    </section>

    <hr class="sec-divider">

    {{-- POR QUÉ ELEGIRNOS --}}
    <section class="py-16 sm:py-20 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="section-title mb-10">¿Por qué elegirnos?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div>
                    <div class="why-title">Contenido práctico</div>
                    <div class="why-desc">Aprendes haciendo, no solo mirando teoría. Proyectos reales desde el primer día.</div>
                </div>
                <div>
                    <div class="why-title">Docentes con experiencia</div>
                    <div class="why-desc">Profesionales activos en el sector tecnológico que conocen las exigencias del mercado.</div>
                </div>
                <div>
                    <div class="why-title">Enfoque laboral</div>
                    <div class="why-desc">Pensado para el mundo real y el empleo. Cada curso está alineado al mercado laboral actual.</div>
                </div>
                <div>
                    <div class="why-title">Contenido actualizado</div>
                    <div class="why-desc">Tecnologías y buenas prácticas actuales. Actualizamos constantemente nuestros programas.</div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
