import { useMemo } from "react";
import { AreaClosed } from "@visx/shape";
import { scaleTime, scaleLinear } from "@visx/scale";
import { max, extent } from "d3-array";
import { LinearGradient } from "@visx/gradient";
import { curveMonotoneX } from "@visx/curve";
import { AxisBottom } from "@visx/axis";

interface ActivityChartProps {
    width: number;
    height: number;
    chart: Array<{
        date: string;
        views: number;
    }>;
}

export default function ({ width, height, chart }: ActivityChartProps) {
    const margin = { top: 12, right: 0, bottom: 23, left: 0 };
    const innerWidth = width - margin.left - margin.right;
    const innerHeight = height - margin.top - margin.bottom;

    // https://tailwindcss.com/docs/customizing-colors
    const strokeFillGradient = ["#475569", "#e2e8f0"];
    const areaFillGradient = ["#94a3b8", "#f8fafc"];
    const backgroundFill = "#f1f5f9";
    const backgroundStroke = "#cbd5e1";
    const tickStroke = "#cbd5e1";
    const tickLabelStroke = "#cbd5e1";

    const getDate = (d) => new Date(d.date);
    const getValue = (d) => d.views;

    const dateScale = useMemo(
        () =>
            scaleTime({
                range: [margin.left, innerWidth + margin.left],
                domain: extent(chart, getDate) as [Date, Date],
            }),
        [innerWidth, margin.left],
    );

    const valueScale = useMemo(
        () =>
            scaleLinear({
                range: [innerHeight + margin.top, margin.top],
                domain: [0, max(chart, getValue) || 0],
                nice: true,
            }),
        [margin.top, innerHeight],
    );

    return width < margin.left || height < margin.top ? null : (
        <svg width={width} height={height}>
            <LinearGradient id="stroke" from={strokeFillGradient[0]} to={strokeFillGradient[1]} />;
            <LinearGradient id="background" from={areaFillGradient[0]} to={areaFillGradient[1]} />;
            <rect
                x={0}
                y={0}
                width={width - margin.left}
                height={height - margin.bottom}
                fill={backgroundFill}
                stroke={backgroundStroke}
                strokeWidth={2}
            />
            <AreaClosed
                data={chart}
                x={(d) => dateScale(getDate(d))}
                y={(d) => valueScale(getValue(d))}
                yScale={valueScale}
                strokeWidth={2}
                stroke="url(#stroke)"
                fill="url(#background)"
                curve={curveMonotoneX}
            />
            <AxisBottom
                scale={dateScale}
                top={innerHeight + margin.top}
                hideAxisLine={true}
                numTicks={width > 520 ? 10 : 5}
                tickStroke={tickStroke}
                tickLabelProps={{
                    fontFamily: "ui-sans-serif, system-ui, -apple-system",
                    stroke: tickLabelStroke,
                    strokeWidth: 0.5,
                }}
            />
        </svg>
    );
}
