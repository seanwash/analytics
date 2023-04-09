interface TotalCardProps {
    label: string;
    count: number;
}

const numberFormat = new Intl.NumberFormat("en-US");

function formattedNumber(number: number) {
    return numberFormat.format(number);
}

export default function ({ label, count }: TotalCardProps) {
    return (
        <div>
            <p>
                <span className="block text-3xl">{formattedNumber(count)}</span> {label}
            </p>
        </div>
    );
}
