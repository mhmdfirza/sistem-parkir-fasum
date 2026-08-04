export type * from './auth';
export type * from './navigation';
export type * from './ui';

import type { User } from './auth';

export interface VehicleType {
    id: number;
    code: string;
    name: string;
    description?: string;
    slot_size: number;
    is_active: boolean;
}

export interface ParkingArea {
    id: number;
    code: string;
    name: string;
    location: string;
    total_capacity: number;
    photo?: string;
    is_active: boolean;
    vehicle_capacities?: AreaVehicleCapacity[];
}

export interface AreaVehicleCapacity {
    id: number;
    parking_area_id: number;
    vehicle_type_id: number;
    capacity: number;
    vehicle_type?: VehicleType;
}

export interface ParkingRate {
    id: number;
    vehicle_type_id: number;
    name: string;
    duration_from: number;
    duration_to: number;
    base_price: number;
    member_discount_pct: number;
    is_active: boolean;
    vehicle_type?: VehicleType;
}

export interface Vehicle {
    id: number;
    plate_number: string;
    owner_name?: string;
    owner_phone?: string;
    vehicle_type_id: number;
    status: 'active' | 'inactive';
    notes?: string;
    vehicle_type?: VehicleType;
    member?: Member;
}

export interface MemberType {
    id: number;
    name: string;
    discount_pct: number;
    price: number;
    duration_days: number;
    benefits?: string;
    is_active: boolean;
}

export interface Member {
    id: number;
    member_code: string;
    name: string;
    phone?: string;
    email?: string;
    vehicle_id: number;
    member_type_id: number;
    valid_from: string;
    valid_until: string;
    custom_discount_pct?: number;
    status: 'active' | 'expired' | 'inactive';
    effective_discount_pct: number;
    vehicle?: Vehicle;
    member_type?: MemberType;
}

export interface ParkingTransaction {
    id: number;
    ticket_number: string;
    parking_area_id: number;
    vehicle_type_id: number;
    vehicle_id?: number;
    member_id?: number;
    plate_number: string;
    check_in_time: string;
    check_out_time?: string;
    duration_minutes?: number;
    duration_formatted?: string;
    base_price?: number;
    discount_pct: number;
    discount_amount: number;
    total_price?: number;
    payment_method?: string;
    amount_paid?: number;
    change_amount: number;
    status: 'IN' | 'OUT' | 'CANCELLED';
    parking_area?: ParkingArea;
    vehicle_type?: VehicleType;
    vehicle?: Vehicle;
    member?: Member;
    check_in_by_user?: User;
    check_out_by_user?: User;
    created_at: string;
}

export interface ActivityLog {
    id: number;
    user_id?: number;
    action: string;
    description: string;
    model_type?: string;
    model_id?: number;
    ip_address?: string;
    created_at: string;
    user?: User;
}

// Pagination response dari Laravel
export interface PaginatedResponse<T> {
    data: T[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    from?: number;
    to?: number;
    links: { url: string | null; label: string; active: boolean }[];
}

// Shared Inertia props
export interface PageProps {
    auth: { user: User | null };
    flash: {
        success?: boolean;
        error?: string;
        message?: string;
        transaction?: ParkingTransaction;
    };
}