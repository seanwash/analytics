import { useEffect, useRef } from "react";
import Chart from "chart.js/auto";

interface ActivityChartProps {
    chart: any;
}

export default function ({ chart }: ActivityChartProps) {
    const canvasElement = useRef<HTMLCanvasElement>(null);

    useEffect(() => {
        if (!canvasElement.current) {
            return;
        }

        new Chart(canvasElement.current, {
            type: "line",
            data: {
                labels: chart.map((item) => item.date),
                datasets: [
                    {
                        label: "Views",
                        data: chart.map((item) => ({ x: item.date, y: item.views })),
                    },
                ],
            },
        });
    }, []);

    return <canvas ref={canvasElement} />;
}
