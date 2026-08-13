import { Link } from '@inertiajs/react';
import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import type { NavItem } from '@/types/navigation';
import AppLogo from './app-logo';
import { dashboard } from '@/routes';
import {
    LayoutDashboard,
    LogIn,
    LogOut,
    History,
    Settings,
    MapPin,
    Car,
    Tag,
    CreditCard,
    Users,
    BarChart3,
    FileText,
    Activity,
    Database,
    Folder,
    BookOpen
} from 'lucide-react';

// Nambah Item Sidebar
const mainNavItems: NavItem[] = [
    {
        label: 'Dashboard',
        href: '/',
        icon: LayoutDashboard,
        roles: ['admin', 'petugas', 'owner']
    },
    {
        label: 'Kendaraan Masuk',
        href: '/transaksi/masuk',
        icon: LogIn,
        roles: ['admin', 'petugas']
    },
    {
        label: 'Kendaraan Keluar',
        href: '/transaksi/keluar',
        icon: LogOut,
        roles: ['admin', 'petugas']
    },
    {
        label: 'Riwayat Transaksi',
        href: '/transaksi/riwayat',
        icon: History,
        roles: ['admin', 'petugas', 'owner']
    },
    {
        label: 'Data Master',
        icon: Settings,
        roles: ['admin'],
        children: [
            {
                label: 'Area Parkir',
                href: '/parking-areas',
                icon: MapPin,
                roles: ['admin']
            },
            {
                label: 'Tipe Kendaraan',
                href: '/vehicle-types',
                icon: Car,
                roles: ['admin']
            },
            {
                label: 'Data Kendaraan',
                href: '/vehicles',
                icon: Car,
                roles: ['admin']
            },
            {
                label: 'Tarif Parkir',
                href: '/parking-rates',
                icon: Tag,
                roles: ['admin']
            },
            {
                label: 'Tipe Member',
                href: '/member-types',
                icon: CreditCard,
                roles: ['admin']
            },
            {
                label: 'Data Member',
                href: '/members',
                icon: Users,
                roles: ['admin']
            },
        ]
    },
    {
        label: 'Manajemen User',
        href: '/users',
        icon: Users,
        roles: ['admin']
    },
    {
        label: 'Laporan',
        icon: BarChart3,
        roles: ['admin', 'owner'],
        children: [
            {
                label: 'Laporan Harian',
                href: '/laporan/harian',
                icon: FileText,
                roles: ['admin', 'owner']
            },
            {
                label: 'Laporan Rentang',
                href: '/laporan/rentang',
                icon: BarChart3,
                roles: ['admin', 'owner']
            },
            {
                label: 'Laporan Occupancy',
                href: '/laporan/occupancy',
                icon: MapPin,
                roles: ['admin', 'owner']
            },
        ]
    },
    {
        label: 'Activity Log',
        href: '/activity-logs',
        icon: Activity,
        roles: ['admin']
    },
    {
        label: 'Backup Database',
        href: '/backup',
        icon: Database,
        roles: ['admin']
    },
];

// Nambah Item Sidebar Footer
const footerNavItems: NavItem[] = [
    {
        label: 'Repository',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        label: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#react',
        icon: BookOpen,
    },
];

// Main Function Sidebar
export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
