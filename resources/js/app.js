const canvasFont = '"Inter", "Segoe UI", Arial, sans-serif';

const wrapCanvasText = (context, text, maxWidth) => {
    const words = String(text || '').replace(/\s+/g, ' ').trim().split(' ').filter(Boolean);
    const lines = [];
    let line = '';

    words.forEach((word) => {
        const testLine = line ? `${line} ${word}` : word;

        if (context.measureText(testLine).width <= maxWidth) {
            line = testLine;
            return;
        }

        if (line) {
            lines.push(line);
        }

        line = word;
    });

    if (line) {
        lines.push(line);
    }

    return lines.length ? lines : [''];
};

const drawRoundedRect = (context, x, y, width, height, radius) => {
    context.beginPath();
    context.moveTo(x + radius, y);
    context.lineTo(x + width - radius, y);
    context.quadraticCurveTo(x + width, y, x + width, y + radius);
    context.lineTo(x + width, y + height - radius);
    context.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
    context.lineTo(x + radius, y + height);
    context.quadraticCurveTo(x, y + height, x, y + height - radius);
    context.lineTo(x, y + radius);
    context.quadraticCurveTo(x, y, x + radius, y);
    context.closePath();
};

const getFutureMapData = (card) => {
    const rows = [...card.querySelectorAll('.summary-row')].map((row) => ({
        label: row.querySelector('span')?.textContent?.trim() || '',
        value: row.querySelector('strong')?.textContent?.trim() || '',
    }));

    return {
        kicker: card.querySelector('.section-kicker')?.textContent?.trim() || 'Kartu Pencapaian',
        title: card.querySelector('h1')?.textContent?.trim() || 'Peta Masa Depan',
        rows,
        commitmentLabel: card.querySelector('.bg-teal-50 span')?.textContent?.trim() || 'Komitmen BERANI',
        commitment: card.querySelector('.bg-teal-50 p')?.textContent?.trim() || '',
    };
};

const renderFutureMapCard = (card) => {
    const data = getFutureMapData(card);
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    const width = 1200;
    const padding = 72;
    const contentWidth = width - (padding * 2);
    const titleMaxWidth = contentWidth;
    const rowValueWidth = 660;
    const rowPadding = 30;
    const rowGap = 22;

    context.font = `900 56px ${canvasFont}`;
    const titleLines = wrapCanvasText(context, data.title, titleMaxWidth);

    context.font = `800 30px ${canvasFont}`;
    const measuredRows = data.rows.map((row) => ({
        ...row,
        lines: wrapCanvasText(context, row.value, rowValueWidth),
    }));

    context.font = `800 34px ${canvasFont}`;
    const commitmentLines = wrapCanvasText(context, data.commitment, contentWidth - 60);
    const rowHeights = measuredRows.map((row) => Math.max(92, 48 + (row.lines.length * 38)));
    const commitmentHeight = 96 + (commitmentLines.length * 44);
    const height = padding + 38 + 24 + (titleLines.length * 68) + 54
        + rowHeights.reduce((total, rowHeight) => total + rowHeight + rowGap, 0)
        + commitmentHeight + padding;

    canvas.width = width;
    canvas.height = height;

    context.fillStyle = '#ffffff';
    context.fillRect(0, 0, width, height);

    context.strokeStyle = '#99f6e4';
    context.lineWidth = 6;
    drawRoundedRect(context, 18, 18, width - 36, height - 36, 24);
    context.stroke();

    let y = padding;

    context.fillStyle = '#0f766e';
    context.font = `800 24px ${canvasFont}`;
    context.fillText(data.kicker.toUpperCase(), padding, y);
    y += 58;

    context.fillStyle = '#020617';
    context.font = `900 56px ${canvasFont}`;
    titleLines.forEach((line) => {
        context.fillText(line, padding, y);
        y += 68;
    });
    y += 18;

    measuredRows.forEach((row, index) => {
        const rowHeight = rowHeights[index];

        context.fillStyle = '#f8fafc';
        drawRoundedRect(context, padding, y, contentWidth, rowHeight, 18);
        context.fill();

        context.fillStyle = '#64748b';
        context.font = `800 26px ${canvasFont}`;
        context.fillText(row.label, padding + rowPadding, y + 48);

        context.fillStyle = '#0f172a';
        context.font = `800 30px ${canvasFont}`;
        row.lines.forEach((line, lineIndex) => {
            context.fillText(line, padding + 390, y + 48 + (lineIndex * 38));
        });

        y += rowHeight + rowGap;
    });

    context.fillStyle = '#ccfbf1';
    drawRoundedRect(context, padding, y, contentWidth, commitmentHeight, 18);
    context.fill();

    context.fillStyle = '#0f766e';
    context.font = `800 26px ${canvasFont}`;
    context.fillText(data.commitmentLabel, padding + 30, y + 50);

    context.fillStyle = '#020617';
    context.font = `800 34px ${canvasFont}`;
    commitmentLines.forEach((line, index) => {
        context.fillText(line, padding + 30, y + 102 + (index * 44));
    });

    return canvas;
};

const canvasToBlob = (canvas) => new Promise((resolve, reject) => {
    canvas.toBlob((blob) => {
        if (blob) {
            resolve(blob);
            return;
        }

        reject(new Error('Canvas tidak bisa dikonversi menjadi gambar.'));
    }, 'image/png');
});

const downloadFutureMapCard = async (button) => {
    const card = document.getElementById('future-map-card');

    if (!card) {
        return;
    }

    const originalText = button.textContent;
    button.disabled = true;
    button.textContent = 'Menyiapkan gambar...';

    try {
        const canvas = renderFutureMapCard(card);
        const blob = await canvasToBlob(canvas);
        const url = URL.createObjectURL(blob);

        const link = document.createElement('a');
        link.download = 'peta-masa-depan.png';
        link.href = url;
        document.body.appendChild(link);
        link.click();
        link.remove();
        setTimeout(() => URL.revokeObjectURL(url), 1000);
    } catch (error) {
        console.error(error);
        alert('Gambar belum bisa diunduh. Coba muat ulang halaman, lalu tekan tombol download lagi.');
    } finally {
        button.disabled = false;
        button.textContent = originalText;
    }
};

const bootGenreInteractions = () => {
    document.querySelectorAll('[data-reveal]').forEach((element) => {
        if (element.dataset.revealReady) {
            return;
        }

        element.dataset.revealReady = 'true';
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.18 });

        observer.observe(element);
    });

    document.querySelectorAll('[data-counter]').forEach((element) => {
        if (element.dataset.counterReady) {
            return;
        }

        element.dataset.counterReady = 'true';
        const target = Number(element.dataset.counter || 0);
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                const start = performance.now();
                const rollDuration = 700;
                const settleDuration = 650;
                const maxRollValue = Math.max(target + 8, Math.ceil(target * 1.8), 12);
                let lastRollingValue = 0;

                const easeOutCubic = (value) => 1 - Math.pow(1 - value, 3);

                const tick = (now) => {
                    const elapsed = now - start;

                    if (elapsed < rollDuration) {
                        const rollProgress = elapsed / rollDuration;
                        const wave = Math.abs(Math.sin(rollProgress * Math.PI * 7));
                        lastRollingValue = Math.round(wave * maxRollValue);
                        element.textContent = lastRollingValue.toLocaleString('id-ID');
                        requestAnimationFrame(tick);
                        return;
                    }

                    const settleProgress = Math.min((elapsed - rollDuration) / settleDuration, 1);
                    const easedProgress = easeOutCubic(settleProgress);
                    const currentValue = Math.round(lastRollingValue + ((target - lastRollingValue) * easedProgress));

                    element.textContent = currentValue.toLocaleString('id-ID');

                    if (settleProgress < 1) {
                        requestAnimationFrame(tick);
                    } else {
                        element.textContent = target.toLocaleString('id-ID');
                    }
                };

                requestAnimationFrame(tick);
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.4 });

        observer.observe(element);
    });

    if (window.Chart && window.genreCharts && !window.genreCharts.ready) {
        window.genreCharts.ready = true;
        const dreamCanvas = document.getElementById('dreamChart');
        const trendCanvas = document.getElementById('trendChart');

        if (dreamCanvas) {
            new window.Chart(dreamCanvas, {
                type: 'bar',
                data: {
                    labels: window.genreCharts.dreams.map((item) => item.cita_cita),
                    datasets: [{
                        label: 'Jumlah',
                        data: window.genreCharts.dreams.map((item) => item.total),
                        backgroundColor: '#0d9488',
                        borderRadius: 8,
                    }],
                },
                options: { responsive: true, maintainAspectRatio: false },
            });
        }

        if (trendCanvas) {
            new window.Chart(trendCanvas, {
                type: 'line',
                data: {
                    labels: window.genreCharts.trend.map((item) => item.date),
                    datasets: [{
                        label: 'Submission',
                        data: window.genreCharts.trend.map((item) => item.total),
                        borderColor: '#0d9488',
                        backgroundColor: 'rgba(13, 148, 136, 0.14)',
                        tension: 0.35,
                        fill: true,
                    }],
                },
                options: { responsive: true, maintainAspectRatio: false },
            });
        }
    }
};

document.addEventListener('click', (event) => {
    const button = event.target.closest('[data-download-card]');

    if (!button) {
        return;
    }

    event.preventDefault();
    downloadFutureMapCard(button);
});

document.addEventListener('DOMContentLoaded', bootGenreInteractions);
document.addEventListener('livewire:navigated', bootGenreInteractions);
document.addEventListener('livewire:initialized', bootGenreInteractions);
document.addEventListener('livewire:updated', bootGenreInteractions);
window.bootGenreInteractions = bootGenreInteractions;

document.addEventListener('livewire:init', () => {
    if (window.Livewire?.hook) {
        window.Livewire.hook('morph.updated', bootGenreInteractions);
    }
});
