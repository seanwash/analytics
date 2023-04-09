export interface RollupCardProps {
    label: string;
    items: Array<{
        value: string;
        count: number;
    }>;
}

export default function ({ label, items }: RollupCardProps) {
    return (
        <table className="min-w-full divide-y divide-gray-400">
            <thead>
                <tr>
                    <th className="py-4 text-left">{label}</th>
                    <th className="py-4 text-right">Count</th>
                </tr>
            </thead>
            <tbody className="divide-y divide-gray-300">
                {items.map(({ value, count }) => (
                    <tr key={value}>
                        <td className="py-4 text-sm text-left">{value}</td>
                        <td className="py-4 text-sm font-semibold text-right">{count}</td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
}
