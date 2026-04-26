@extends('layouts.app')

@section('title', 'Capacitación - EducaPerú')

@section('content')
<style>
    .pg { background: #09090b; min-height: 100vh; }

    /* ── Hero Section ── */
    .hero-section {
        background: radial-gradient(ellipse 80% 50% at 50% -10%, rgba(99,102,241,0.18) 0%, transparent 70%), #09090b;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        padding: 60px 0;
    }

    .hero-content {
        max-width: 5xl;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
    }

    .hero-text h1 {
        font-size: clamp(32px, 5vw, 48px);
        font-weight: 900;
        color: #f1f5f9;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .hero-text p {
        font-size: 16px;
        color: #a1a1aa;
        line-height: 1.8;
        margin-bottom: 24px;
    }

    .btn-inscribirse {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 28px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 800;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        text-decoration: none;
        box-shadow: 0 4px 20px rgba(99,102,241,.4);
        transition: box-shadow .25s, transform .25s;
        border: none;
        cursor: pointer;
    }

    .btn-inscribirse:hover {
        box-shadow: 0 8px 28px rgba(99,102,241,.6);
        transform: translateY(-2px);
    }

    .hero-image {
        position: relative;
    }

    .hero-image img {
        width: 100%;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.08);
    }

    /* ── Features Cards ── */
    .features-section {
        padding: 60px 0;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .features-grid {
        max-width: 5xl;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        padding: 0 20px;
    }

    .feature-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        transition: border-color .25s ease, transform .25s ease;
    }

    .feature-card:hover {
        border-color: rgba(99,102,241,0.3);
        transform: translateY(-3px);
    }

    .feature-card2 {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        transition: border-color .25s ease, transform .25s ease;
    }

    .feature-icon {
        font-size: 32px;
        margin-bottom: 12px;
    }

    .feature-value {
        font-size: 20px;
        font-weight: 800;
        color: #f1f5f9;
        margin-bottom: 6px;
    }

    .feature-label {
        font-size: 12px;
        color: #71717a;
        font-weight: 600;
    }

    /* ── About Section ── */
    .about-section {
        padding: 60px 0;
        background: rgba(99,102,241,0.05);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .about-content {
        max-width: 5xl;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-label {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: #6366f1;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-label::before {
        content: '';
        display: block;
        width: 28px;
        height: 2px;
        background: #6366f1;
        border-radius: 2px;
        flex-shrink: 0;
    }

    .section-title {
        font-size: clamp(26px, 4vw, 40px);
        font-weight: 900;
        color: #f1f5f9;
        line-height: 1.15;
        letter-spacing: -.5px;
        margin-bottom: 24px;
    }

    .about-text {
        font-size: 14.5px;
        color: #a1a1aa;
        line-height: 1.85;
        margin-bottom: 16px;
    }

    .cta-button-section {
        text-align: center;
        margin-top: 32px;
    }

    /* ── Curriculum Section ── */
    .curriculum-section {
        padding: 60px 0;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .curriculum-content {
        max-width: 5xl;
        margin: 0 auto;
        padding: 0 20px;
    }

    .accordion-item {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 12px;
        margin-bottom: 12px;
        overflow: hidden;
        transition: border-color .25s ease;
    }

    .accordion-item:hover {
        border-color: rgba(99,102,241,0.3);
    }

    .accordion-header {
        background: rgba(255,255,255,0.03);
        padding: 18px 24px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: background .25s ease;
    }

    .accordion-header:hover {
        background: rgba(255,255,255,0.05);
    }

    .accordion-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #6366f1;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 12px;
        flex-shrink: 0;
        transition: transform .25s ease;
    }

    .accordion-item.active .accordion-icon {
        transform: rotate(180deg);
    }

    .accordion-title {
        font-size: 15px;
        font-weight: 700;
        color: #f1f5f9;
        flex: 1;
    }

    .accordion-content {
        background: rgba(255,255,255,0.01);
        padding: 0 24px;
        max-height: 0;
        overflow: hidden;
        transition: max-height .3s ease, padding .3s ease;
    }

    .accordion-item.active .accordion-content {
        max-height: 500px;
        padding: 24px;
    }

    .accordion-text {
        font-size: 13px;
        color: #a1a1aa;
        line-height: 1.8;
    }

    /* ── Docentes Section ── */
    .docentes-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #1e3a8a 0%, #1e1b4b 100%);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .docentes-content {
        max-width: 5xl;
        margin: 0 auto;
        padding: 0 20px;
    }

    .docentes-title {
        font-size: clamp(26px, 4vw, 40px);
        font-weight: 900;
        color: #f1f5f9;
        margin-bottom: 32px;
    }

    .docentes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }

    .docente-card {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 24px;
        transition: border-color .25s ease;
    }

    .docente-card:hover {
        border-color: rgba(99,102,241,0.3);
    }

    .docente-header {
        display: flex;
        gap: 16px;
        margin-bottom: 16px;
        align-items: center;
    }

    .docente-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        flex-shrink: 0;
    }

    .docente-info h3 {
        font-size: 14px;
        font-weight: 800;
        color: #f1f5f9;
        margin-bottom: 4px;
    }

    .docente-info p {
        font-size: 12px;
        color: #a1a1aa;
    }

    .docente-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-small {
        flex: 1;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: transform .25s ease;
    }

    .btn-small:hover {
        transform: translateY(-2px);
    }

    .btn-cv {
        background: #6366f1;
        color: white;
    }

    .btn-descargar {
        background: #10b981;
        color: white;
    }

    /* ── Other Courses Section ── */
    .other-courses-section {
        padding: 60px 0;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .other-courses-content {
        max-width: 5xl;
        margin: 0 auto;
        padding: 0 20px;
    }

    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
        margin-top: 32px;
    }

    .course-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        overflow: hidden;
        transition: border-color .25s ease, transform .25s ease;
    }

    .course-card:hover {
        border-color: rgba(99,102,241,0.3);
        transform: translateY(-3px);
    }

    .course-image {
        width: 100%;
        height: 160px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
    }

    .course-info {
        padding: 16px;
    }

    .course-title {
        font-size: 14px;
        font-weight: 800;
        color: #f1f5f9;
        margin-bottom: 8px;
    }

    .course-desc {
        font-size: 12px;
        color: #a1a1aa;
        line-height: 1.6;
    }

    /* ── CTA Final Section ── */
    .cta-final-section {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e1b4b 100%);
        padding: 60px 0;
        border-top: 1px solid rgba(255,255,255,0.05);
    }

    .cta-final-content {
        max-width: 5xl;
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
    }

    .cta-final-title {
        font-size: clamp(24px, 4vw, 36px);
        font-weight: 900;
        color: #f1f5f9;
        margin-bottom: 12px;
    }

    .cta-final-text {
        font-size: 14px;
        color: #cbd5e1;
        margin-bottom: 32px;
        max-width: 2xl;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
        }

        .features-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .docentes-grid {
            grid-template-columns: 1fr;
        }

        .courses-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="pg">

    {{-- HERO SECTION --}}
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1>OFIMÁTICA PROFESIONAL</h1>
                <p>Domina las herramientas office más demandadas en el mercado laboral. Aprende a crear documentos, presentaciones y hojas de cálculo como un profesional.</p>
                <button class="btn-inscribirse">
                    Inscribirse
                </button>
            </div>
            <div class="hero-image">
                <img src="https://via.placeholder.com/400x300?text=Ofimática" alt="Ofimática Profesional">
            </div>
        </div>
    </section>

    {{-- FEATURES SECTION --}}
    <section class="features-section">
        <div class="features-grid">
            <div class="feature-card2">
                <div class="feature-icon">⏱️</div>
                <div class="feature-value">02 meses</div>
                <div class="feature-label">Duración</div>
            </div>
            <div class="feature-card2">
                <div class="feature-icon">💻</div>
                <div class="feature-value">Virtual</div>
                <div class="feature-label">Modalidad</div>
            </div>
            <div class="feature-card2">
                <div class="feature-icon">💵</div>
                <div class="feature-value">S/ 45.50</div>
                <div class="feature-label">Inversión</div>
            </div>
            <div class="feature-card2">
                <div class="feature-icon">📅</div>
                <div class="feature-value">Del 21/04/2026</div>
                <div class="feature-label">Fechas</div>
            </div>
            <div class="feature-card2">
                <div class="feature-icon">👨‍🏫</div>
                <div class="feature-value">3 instructores</div>
                <div class="feature-label">Docentes</div>
            </div>
        </div>
    </section>

    {{-- ABOUT SECTION --}}
    <section class="about-section">
        <div class="about-content">
            <div class="section-label">Sobre esta capacitación</div>
            <h2 class="section-title">¿Qué aprenderás?</h2>
            <p class="about-text">
                El Curso de Especialización en Ofimática Profesional está diseñado para fortalecer las competencias en el uso eficiente de las principales herramientas ofimáticas: Microsoft Excel, Word y PowerPoint.
            </p>
            <p class="about-text">
                A lo largo del curso, aprenderás a optimizar procesos administrativos, mejorar la presentación de documentos, analizar información de forma efectiva y desarrollar habilidades digitales esenciales para un mejor desempeño en tu institución y entorno laboral.
            </p>
            <div class="cta-button-section">
                <button class="btn-inscribirse">
                    Ver temario
                </button>
            </div>
        </div>
    </section>

    {{-- CURRICULUM SECTION --}}
    <section class="curriculum-section">
        <div class="curriculum-content">
            <h2 class="section-title">Temario</h2>

            <div class="accordion-item active">
                <div class="accordion-header">
                    <div class="accordion-icon">1</div>
                    <div class="accordion-title">Microsoft Word</div>
                </div>
                <div class="accordion-content">
                    <div class="accordion-text">
                        Introducción a Word, formato de documentos, creación de estilos, tablas, índices, referencias cruzadas, combinación de correspondencia y más.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <div class="accordion-icon">2</div>
                    <div class="accordion-title">Microsoft PowerPoint</div>
                </div>
                <div class="accordion-content">
                    <div class="accordion-text">
                        Diseño de presentaciones profesionales, animaciones, transiciones, manejo de multimedia, presentación efectiva y técnicas de impacto visual.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <div class="accordion-icon">3</div>
                    <div class="accordion-title">Microsoft Excel</div>
                </div>
                <div class="accordion-content">
                    <div class="accordion-text">
                        Funciones básicas y avanzadas, análisis de datos, gráficos, tablas dinámicas, validación de datos, macros y reporting profesional.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DOCENTES SECTION --}}
    <section class="docentes-section">
        <div class="docentes-content">
            <h2 class="docentes-title">Docentes</h2>
            <div class="docentes-grid">
                <div class="docente-card">
                    <div class="docente-header">
                        <div class="docente-avatar"></div>
                        <div class="docente-info">
                            <h3>Deysi Alicia Flores Toledo</h3>
                            <p>Docente con amplia experiencia.</p>
                        </div>
                    </div>
                    <div class="docente-buttons">
                        <button class="btn-small btn-cv">📄 Ver CV</button>
                        <button class="btn-small btn-descargar">⬇️ Descargar CV</button>
                    </div>
                </div>

                <div class="docente-card">
                    <div class="docente-header">
                        <div class="docente-avatar"></div>
                        <div class="docente-info">
                            <h3>Roxana Karina Diaz Zavala</h3>
                            <p>Docente con amplia experiencia.</p>
                        </div>
                    </div>
                    <div class="docente-buttons">
                        <button class="btn-small btn-cv">📄 Ver CV</button>
                        <button class="btn-small btn-descargar">⬇️ Descargar CV</button>
                    </div>
                </div>

                <div class="docente-card">
                    <div class="docente-header">
                        <div class="docente-avatar"></div>
                        <div class="docente-info">
                            <h3>Madely Jhuleys Blas Bacilio</h3>
                            <p>Docente con amplia experiencia.</p>
                        </div>
                    </div>
                    <div class="docente-buttons">
                        <button class="btn-small btn-cv">📄 Ver CV</button>
                        <button class="btn-small btn-descargar">⬇️ Descargar CV</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- OTHER COURSES SECTION --}}
    <section class="other-courses-section">
        <div class="other-courses-content">
            <h2 class="section-title">Otras capacitaciones que te pueden interesar</h2>
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-image">📱</div>
                    <div class="course-info">
                        <div class="course-title">MARKETING DIGITAL CON INTELIGENCIA ARTIFICIAL</div>
                        <div class="course-desc">Aprende a impulsar tu negocio con estrategias digitales modernas.</div>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">💻</div>
                    <div class="course-info">
                        <div class="course-title">DESARROLLO WEB FULL STACK</div>
                        <div class="course-desc">Conviértete en desarrollador web con tecnologías actuales.</div>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">🎨</div>
                    <div class="course-info">
                        <div class="course-title">DISEÑO GRÁFICO PROFESIONAL</div>
                        <div class="course-desc">Domina las herramientas de diseño más demandadas.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA FINAL SECTION --}}
    <section class="cta-final-section">
        <div class="cta-final-content">
            <h2 class="cta-final-title">Da el siguiente paso en tu formación profesional</h2>
            <p class="cta-final-text">
                Inscríbete ahora y empieza a desarrollar habilidades en Ofimática Profesional con nuestra base sólida de enseñanza.
            </p>
            <button class="btn-inscribirse">
                Inscribirse
            </button>
        </div>
    </section>

</div>

<script>
    // Accordion functionality
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            item.classList.toggle('active');
        });
    });
</script>

@endsection
